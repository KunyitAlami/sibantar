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
    public $activePanel = 'about';
    public $layanan;

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

    /**
     * DEPRECATED - Use autoRejectOrder() instead
     */
    public function handleCountdownAction($orderId)
    {
        $this->autoRejectOrder($orderId);
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
            Log::info("🚨 autoRejectOrder dipanggil untuk order #{$orderId}");
            
            $order = OrderModel::with('countDown')->find($orderId);
            
            if (!$order) {
                Log::warning("❌ Auto-reject: Order #{$orderId} tidak ditemukan");
                return;
            }

            Log::info("Order #{$orderId} status countdown: " . ($order->countDown?->status ?? 'NULL'));
            Log::info("Order #{$orderId} status order: " . $order->status);

            // Cek apakah memang belum dikonfirmasi
            if ($order->countDown && $order->countDown->status === 'tidak_dikonfirmasi') {
                
                Log::info("✅ Kondisi terpenuhi, melakukan auto-reject...");
                
                // Update countdown
                $order->countDown->update([
                    'status' => 'terkonfirmasi',
                    'waktu_konfirmasi' => now()
                ]);
                
                // Update order status
                $order->update(['status' => 'ditolak']);
                
                Log::info("✅ Order #{$orderId} berhasil ditolak otomatis karena waktu konfirmasi habis");
                
                $this->dispatch('notification', [
                    'type' => 'warning',
                    'message' => 'Pesanan #' . $orderId . ' otomatis ditolak (waktu habis)'
                ]);
                
                // Reload data
                $this->loadOrders();
            } else {
                Log::warning("❌ Kondisi tidak terpenuhi untuk auto-reject order #{$orderId}");
            }
            
        } catch (\Exception $e) {
            Log::error("❌ Error auto-reject order #{$orderId}: " . $e->getMessage());
            Log::error($e->getTraceAsString());
            
            $this->dispatch('notification', [
                'type' => 'error',
                'message' => 'Terjadi kesalahan saat menolak pesanan otomatis'
            ]);
        }
    }

    public function gotoFinalPrice($orderId)
    {
        return redirect()->route('bengkel.order-tracking', ['orderId' => $orderId]);
    }

    public function loadOrders()
    {
        $this->render();
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
        $orders = OrderModel::where('id_bengkel', $this->id_bengkel)
            ->with('user', 'layananBengkel', 'countDown', 'bengkel')
            ->get();

        foreach ($orders as $order) {
            // FIX: Cek 'tidak_dikonfirmasi' bukan 'pending'
            $order->countdown_active = 
                $order->countDown?->status === 'tidak_dikonfirmasi' 
                && $order->status !== 'ditolak';
            
            // FIX: Tambah countdown_confirmed
            $order->countdown_confirmed = $order->countDown?->status === 'terkonfirmasi';
            
            // Calculate distance
            $order->distance_km = $this->calculateDistance($order);

            // Calculate countdown milliseconds
            if ($order->countDown?->batas_konfirmasi) {
                $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
                $now = Carbon::now($clientZone);
                $order->countdown_ms = max(($batas->timestamp * 1000) - ($now->timestamp * 1000), 0);
            } else {
                $order->countdown_ms = null;
            }
            
            // Debug logging
            if ($order->countdown_active) {
                Log::info("Order #{$order->id_order} - Countdown Active, Remaining: " . 
                    floor($order->countdown_ms / 1000) . " seconds");
            }
        }

        return view('livewire.bengkel.bengkel-dashboard', [
            'bengkel' => $bengkel,
            'orders' => $orders,
            'layanan' => $this->layanan,
        ]);
    }
}