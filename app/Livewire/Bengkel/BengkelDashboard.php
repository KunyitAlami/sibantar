<?php

namespace App\Livewire\Bengkel;

use Livewire\Component;
use App\Models\BengkelModel;
use App\Models\OrderModel;
use App\Models\LayananBengkelModel;
use App\Models\OrderTrackingModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class BengkelDashboard extends Component
{
    public $id_bengkel;
    public $activePanel = 'order';
    public $layanan;
    
    // Cache untuk menghindari re-calculation
    protected $ordersCache = null;
    protected $lastLoadTime = null;

    public function mount($id_bengkel)
    {
        $this->id_bengkel = $id_bengkel;
        $this->layanan = LayananBengkelModel::where('id_bengkel', $this->id_bengkel)->get();
    }

    public function setPanel($panel)
    {
        $this->activePanel = $panel;
    }

    private function haversineDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);
        $a = sin($dLat/2) * sin($dLat/2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng/2) * sin($dLng/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $earthRadius * $c;
    }

    private function calculateDistance($order)
    {
        $userLat = trim($order->user_latitude ?? '');
        $userLng = trim($order->user_longitude ?? '');
        $bengkelLat = trim($order->bengkel_latitude ?? '');
        $bengkelLng = trim($order->bengkel_longitude ?? '');

        if (empty($userLat) || empty($userLng) || empty($bengkelLat) || empty($bengkelLng)) {
            return null;
        }

        try {
            $latBengkel = (float) str_replace(',', '.', $bengkelLat);
            $lngBengkel = (float) str_replace(',', '.', $bengkelLng);
            $latUser = (float) str_replace(',', '.', $userLat);
            $lngUser = (float) str_replace(',', '.', $userLng);

            if (
                $latBengkel >= -90 && $latBengkel <= 90 &&
                $lngBengkel >= -180 && $lngBengkel <= 180 &&
                $latUser >= -90 && $latUser <= 90 &&
                $lngUser >= -180 && $lngUser <= 180 &&
                $latBengkel != 0 && $lngBengkel != 0 &&
                $latUser != 0 && $lngUser != 0
            ) {
                $distance = $this->haversineDistance(
                    $latBengkel,
                    $lngBengkel,
                    $latUser,
                    $lngUser
                );
                return round($distance, 2);
            }
        } catch (\Exception $e) {
            Log::error("Error calculating distance for order {$order->id_order}: " . $e->getMessage());
        }

        return null;
    }

    public function acceptOrder($orderId)
    {
        try {
            $order = OrderModel::with('countDown')->find($orderId);
            
            if (!$order) {
                $this->dispatch('notification', [
                    'type' => 'error',
                    'message' => 'Pesanan tidak ditemukan'
                ]);
                return;
            }

            // Cek apakah masih dalam waktu konfirmasi
            if ($order->countDown && $order->countDown->status === 'tidak_dikonfirmasi') {
                $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
                $now = Carbon::now($clientZone);
                
                if ($now->greaterThan($batas)) {
                    Log::warning("Attempt to accept expired order #{$orderId}");
                    $this->dispatch('notification', [
                        'type' => 'error',
                        'message' => 'Waktu konfirmasi sudah habis'
                    ]);
                    
                    // Auto-reject karena waktu habis
                    $this->autoRejectOrder($orderId);
                    return;
                }
            }

            // Update countdown
            $order->countDown->update([
                'status' => 'terkonfirmasi',
                'waktu_konfirmasi' => now()
            ]);
            
            // Update order status
            $order->update(['status' => 'pending']);

            // Create tracking if not exists
            $tracking = OrderTrackingModel::where('id_order', $orderId)->first();
            if (!$tracking) {
                OrderTrackingModel::create([
                    'id_order' => $orderId,
                    'current_step' => 1, 
                    'finalPrice' => null,
                ]);
            }

            Log::info("Order #{$orderId} diterima oleh bengkel");

            $this->dispatch('notification', [
                'type' => 'success',
                'message' => 'Pesanan berhasil diterima'
            ]);
            
            // Dispatch event untuk update UI real-time
            $this->dispatch('order-confirmed', ['orderId' => $orderId]);

            // Clear cache dan reload
            $this->ordersCache = null;
            $this->loadOrders();

        } catch (\Exception $e) {
            Log::error("Error accepting order #{$orderId}: " . $e->getMessage());
            
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => 'Terjadi kesalahan saat menerima pesanan'
            ]);
        }
    }

    public function rejectOrder($orderId)
    {
        try {
            $order = OrderModel::with('countDown')->find($orderId);
            
            if (!$order) {
                $this->dispatch('notification', [
                    'type' => 'error',
                    'message' => 'Pesanan tidak ditemukan'
                ]);
                return;
            }

            // Cek apakah sudah dikonfirmasi sebelumnya
            if ($order->countDown?->status === 'terkonfirmasi') {
                Log::warning("Attempt to reject already confirmed order #{$orderId}");
                $this->dispatch('notification', [
                    'type' => 'error',
                    'message' => 'Pesanan sudah dikonfirmasi sebelumnya'
                ]);
                return;
            }

            // Update countdown
            $order->countDown->update([
                'status' => 'terkonfirmasi',
                'waktu_konfirmasi' => now()
            ]);
            
            // Update order status
            $order->update(['status' => 'ditolak']);

            Log::info("Order #{$orderId} ditolak oleh bengkel (manual)");

            $this->dispatch('notification', [
                'type' => 'info',
                'message' => 'Pesanan telah ditolak'
            ]);

            // Clear cache dan reload
            $this->ordersCache = null;
            $this->loadOrders();

        } catch (\Exception $e) {
            Log::error("Error rejecting order #{$orderId}: " . $e->getMessage());
            
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => 'Terjadi kesalahan saat menolak pesanan'
            ]);
        }
    }

    public function autoRejectOrder($orderId)
    {
        try {
            Log::info("autoRejectOrder dipanggil untuk order #{$orderId}");
            Log::info("Request dari: " . request()->ip());
            Log::info("Timestamp: " . now()->toDateTimeString());
            
            $order = OrderModel::with('countDown')->find($orderId);
            
            if (!$order) {
                Log::warning("Auto-reject: Order #{$orderId} tidak ditemukan");
                $this->dispatch('notification', [
                    'type' => 'error',
                    'message' => 'Pesanan tidak ditemukan'
                ]);
                return;
            }

            Log::info("Order #{$orderId} countdown status: " . ($order->countDown?->status ?? 'NULL'));
            Log::info("Order #{$orderId} order status: " . $order->status);

            // CRITICAL: Cek apakah memang belum dikonfirmasi dan belum ditolak
            if ($order->countDown && 
                $order->countDown->status === 'tidak_dikonfirmasi' && 
                $order->status !== 'ditolak') {
                
                // Double check: pastikan waktu benar-benar habis
                $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
                $now = Carbon::now($clientZone);
                
                Log::info("Batas waktu: " . $batas->toDateTimeString());
                Log::info("Waktu sekarang: " . $now->toDateTimeString());
                Log::info("Selisih detik: " . $now->diffInSeconds($batas, false));
                
                if ($now->lessThan($batas)) {
                    $remainingSeconds = $batas->diffInSeconds($now);
                    Log::warning("Auto-reject dipanggil terlalu cepat untuk order #{$orderId}");
                    Log::warning("Masih ada waktu {$remainingSeconds} detik lagi");
                    
                    $this->dispatch('notification', [
                        'type' => 'warning',
                        'message' => "Masih ada waktu {$remainingSeconds} detik"
                    ]);
                    return;
                }
                
                Log::info("Kondisi terpenuhi, melakukan auto-reject...");
                
                // Update countdown
                $countdownUpdated = $order->countDown->update([
                    'status' => 'terkonfirmasi',
                    'waktu_konfirmasi' => now()
                ]);
                Log::info("Countdown update result: " . ($countdownUpdated ? 'SUCCESS' : 'FAILED'));
                
                // Update order status
                $orderUpdated = $order->update(['status' => 'ditolak']);
                Log::info("Order update result: " . ($orderUpdated ? 'SUCCESS' : 'FAILED'));
                
                if ($countdownUpdated && $orderUpdated) {
                    Log::info("Order #{$orderId} berhasil ditolak otomatis karena waktu konfirmasi habis");
                    
                    $this->dispatch('notification', [
                        'type' => 'warning',
                        'message' => 'Pesanan #' . $orderId . ' otomatis ditolak (waktu habis)'
                    ]);
                    
                    // Clear cache dan reload
                    $this->ordersCache = null;
                    $this->loadOrders();
                    
                    // Dispatch browser event untuk update UI
                    $this->dispatch('order-auto-rejected', ['orderId' => $orderId]);
                } else {
                    Log::error("Gagal update database untuk order #{$orderId}");
                }
                
            } else {
                Log::warning("Kondisi tidak terpenuhi untuk auto-reject order #{$orderId}");
                Log::info("Countdown exists: " . ($order->countDown ? 'YES' : 'NO'));
                Log::info("Countdown status: " . ($order->countDown?->status ?? 'NULL'));
                Log::info("Order status: " . $order->status);
                
                $this->dispatch('notification', [
                    'type' => 'info',
                    'message' => 'Pesanan sudah diproses sebelumnya'
                ]);
            }
            
        } catch (\Exception $e) {
            Log::error("Error auto-reject order #{$orderId}: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            Log::error("File: " . $e->getFile() . " Line: " . $e->getLine());
            
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }

    public function gotoFinalPrice($orderId)
    {
        return redirect()->route('bengkel.order-tracking', ['orderId' => $orderId]);
    }

    public function loadOrders()
    {
        // Force reload by clearing cache
        $this->ordersCache = null;
        $this->lastLoadTime = now();
    }
    
    public function hapusLayanan($id_layanan_bengkel)
    {
        $layanan = LayananBengkelModel::find($id_layanan_bengkel);
        
        if (!$layanan || $layanan->id_bengkel != $this->id_bengkel) {
            session()->flash('error', 'Layanan tidak ditemukan.');
            return;
        }

        try {
            $layanan->delete();
            $this->layanan = LayananBengkelModel::where('id_bengkel', $this->id_bengkel)->get();
            
            session()->flash('success', 'Layanan berhasil dihapus.');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghapus layanan.');
            Log::error('Hapus layanan error: '.$e->getMessage());
        }
    }

    public function editLayanan($id_layanan_bengkel)
    {
        return redirect()->route('bengkel.edit.layanan', $id_layanan_bengkel);
    }

    public function render()
    {
        $bengkel = BengkelModel::find($this->id_bengkel);
        
        // Optimasi: hanya query jika belum ada cache atau sudah expired
        if ($this->ordersCache === null || 
            ($this->lastLoadTime && now()->diffInSeconds($this->lastLoadTime) > 5)) {
            
            $orders = OrderModel::where('id_bengkel', $this->id_bengkel)
                ->with(['user', 'layananBengkel', 'countDown', 'bengkel'])
                ->orderBy('created_at', 'desc')
                ->get();

            foreach ($orders as $order) {
                // Calculate countdown first
                $order->countdown_ms = null;
                $order->countdown_active = false;
                $order->countdown_confirmed = false;
                
                if ($order->countDown?->batas_konfirmasi) {
                    $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                    
                    try {
                        $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
                        $now = Carbon::now($clientZone);
                        $diffMs = ($batas->timestamp * 1000) - ($now->timestamp * 1000);
                        
                        $order->countdown_ms = max($diffMs, 0);
                        
                        // Status flags
                        $order->countdown_active = 
                            $order->countDown->status === 'tidak_dikonfirmasi' 
                            && $order->status !== 'ditolak'
                            && $order->countdown_ms > 0;
                        
                        $order->countdown_confirmed = 
                            $order->countDown->status === 'terkonfirmasi';
                        
                        // CRITICAL: Backend safety net - Auto-reject expired orders
                        if ($order->countDown->status === 'tidak_dikonfirmasi' && 
                            $order->countdown_ms <= 0 && 
                            $order->status !== 'ditolak') {
                            
                            Log::warning("BACKEND SAFETY NET: Detected expired countdown for order #{$order->id_order}");
                            Log::info("Batas waktu: " . $batas->toDateTimeString() . " | Sekarang: " . $now->toDateTimeString());
                            
                            try {
                                // Update langsung di database
                                $countdownUpdated = $order->countDown->update([
                                    'status' => 'terkonfirmasi',
                                    'waktu_konfirmasi' => now()
                                ]);
                                
                                $orderUpdated = $order->update(['status' => 'ditolak']);
                                
                                if ($countdownUpdated && $orderUpdated) {
                                    Log::info("BACKEND: Order #{$order->id_order} berhasil auto-rejected");
                                    
                                    // Reload order after update
                                    $order->refresh();
                                    $order->countdown_active = false;
                                    $order->countdown_confirmed = true;
                                    
                                    // Invalidate cache untuk refresh di next render
                                    $this->ordersCache = null;
                                } else {
                                    Log::error("BACKEND: Gagal update order #{$order->id_order}");
                                }
                            } catch (\Exception $e) {
                                Log::error("BACKEND ERROR for order #{$order->id_order}: " . $e->getMessage());
                            }
                        }
                        
                    } catch (\Exception $e) {
                        Log::error("Error calculating countdown for order #{$order->id_order}: " . $e->getMessage());
                    }
                }
                
                // Calculate distance
                $order->distance_km = $this->calculateDistance($order);
                
                // Debug logging untuk order yang aktif
                if ($order->countdown_active) {
                    $seconds = floor($order->countdown_ms / 1000);
                    Log::debug("Order #{$order->id_order} - Active countdown: {$seconds}s remaining");
                }
            }
            
            $this->ordersCache = $orders;
        } else {
            $orders = $this->ordersCache;
        }

        return view('livewire.bengkel.bengkel-dashboard', [
            'bengkel' => $bengkel,
            'orders' => $orders,
            'layanan' => $this->layanan,
        ]);
    }
}