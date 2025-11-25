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

            if ($order->countDown && $order->countDown->status === 'tidak_dikonfirmasi') {
                $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
                $now = Carbon::now($clientZone);
                
                if ($now->greaterThan($batas)) {
                    $this->dispatch('notification', [
                        'type' => 'error',
                        'message' => 'Waktu konfirmasi sudah habis'
                    ]);
                    
                    $this->autoRejectOrder($orderId);
                    return;
                }
            }

            $order->countDown->update([
                'status' => 'terkonfirmasi',
                'waktu_konfirmasi' => now()
            ]);
            
            $order->update(['status' => 'pending']);

            $tracking = OrderTrackingModel::where('id_order', $orderId)->first();
            if (!$tracking) {
                OrderTrackingModel::create([
                    'id_order' => $orderId,
                    'current_step' => 1, 
                    'finalPrice' => null,
                ]);
            }

            $this->dispatch('notification', [
                'type' => 'success',
                'message' => 'Pesanan berhasil diterima'
            ]);
            
            $this->dispatch('order-confirmed', ['orderId' => $orderId]);
            $this->ordersCache = null;

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

            if ($order->countDown?->status === 'terkonfirmasi') {
                $this->dispatch('notification', [
                    'type' => 'error',
                    'message' => 'Pesanan sudah dikonfirmasi sebelumnya'
                ]);
                return;
            }

            $order->countDown->update([
                'status' => 'terkonfirmasi',
                'waktu_konfirmasi' => now()
            ]);
            
            $order->update(['status' => 'ditolak']);

            $this->dispatch('notification', [
                'type' => 'info',
                'message' => 'Pesanan telah ditolak'
            ]);

            $this->ordersCache = null;

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
            $order = OrderModel::with('countDown')->find($orderId);
            
            if (!$order || !$order->countDown) {
                return;
            }

            if ($order->countDown->status !== 'tidak_dikonfirmasi') {
                return;
            }

            if ($order->status === 'ditolak') {
                return;
            }

            $clientZone = $order->client_timezone ?? 'Asia/Makassar';
            $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
            $now = Carbon::now($clientZone);
            
            if ($now->lessThan($batas)) {
                return;
            }

            $order->countDown->update([
                'status' => 'terkonfirmasi',
                'waktu_konfirmasi' => now()
            ]);
            
            $order->update([
                'status' => 'ditolak'
            ]);

            $this->dispatch('notification', [
                'type' => 'warning',
                'message' => "Pesanan #{$orderId} otomatis ditolak (waktu habis)"
            ]);
            
            $this->dispatch('order-auto-rejected', ['orderId' => $orderId]);
            $this->ordersCache = null;
            
        } catch (\Exception $e) {
            Log::error("Error auto-reject order #{$orderId}: " . $e->getMessage());
        }
    }

    public function checkExpiredOrders()
    {
        try {
            $clientZone = 'Asia/Makassar';
            $now = Carbon::now($clientZone);
            
            $expiredOrders = OrderModel::whereHas('countDown', function($query) use ($now) {
                $query->where('status', 'tidak_dikonfirmasi')
                      ->where('batas_konfirmasi', '<', $now);
            })
            ->where('id_bengkel', $this->id_bengkel)
            ->where('status', '!=', 'ditolak')
            ->get();
            
            foreach ($expiredOrders as $order) {
                $order->countDown->update([
                    'status' => 'terkonfirmasi',
                    'waktu_konfirmasi' => now()
                ]);
                
                $order->update(['status' => 'ditolak']);
            }
            
            if ($expiredOrders->count() > 0) {
                $this->ordersCache = null;
                $this->dispatch('notification', [
                    'type' => 'warning',
                    'message' => "{$expiredOrders->count()} pesanan otomatis ditolak"
                ]);
            }
            
        } catch (\Exception $e) {
            Log::error("Error checking expired orders: " . $e->getMessage());
        }
    }
    public function cekReview($id_order)
    {
        Log::info("🔵 cekReview dipanggil dengan id_order: {$id_order}");
        
        // ✅ Cek dulu apakah ada review
        $order = OrderModel::with('review')->find($id_order);
        
        if (!$order || !$order->review) {
            Log::warning("Review tidak ditemukan untuk order #{$id_order}");
            
            $this->dispatch('notification', [
                'type' => 'warning',
                'message' => 'Review belum tersedia untuk pesanan ini'
            ]);
            return;
        }
        
        // ✅ Redirect ke route yang benar
        $route = route('bengkel.cekReview.order', ['id_order' => $id_order]);
        Log::info("🔵 Redirect ke: {$route}");
        
        $this->redirect($route);
    }

    public function gotoFinalPrice($orderId)
    {
        Log::info("🔵 gotoFinalPrice dipanggil dengan orderId: {$orderId}");
        
        $route = route('bengkel.order-tracking', ['orderId' => $orderId]);
        Log::info("🔵 Route yang akan diakses: {$route}");
        
        $this->redirect($route);
    }

    public function loadOrders()
    {
        $this->ordersCache = null;
        $this->lastLoadTime = now();
        $this->checkExpiredOrders();
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

    // public function render()
    // {
    //     $bengkel = BengkelModel::find($this->id_bengkel);
        
    //     if ($this->ordersCache === null || 
    //         ($this->lastLoadTime && now()->diffInSeconds($this->lastLoadTime) > 5)) {
            
    //         $orders = OrderModel::where('id_bengkel', $this->id_bengkel)
    //             ->with(['user', 'layananBengkel', 'countDown', 'bengkel'])
    //             ->orderBy('created_at', 'desc')
    //             ->get();

    //         foreach ($orders as $order) {
    //             $order->countdown_ms = null;
    //             $order->countdown_active = false;
    //             $order->countdown_confirmed = false;
                
    //             if ($order->countDown?->batas_konfirmasi) {
    //                 $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                    
    //                 try {
    //                     $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
    //                     $now = Carbon::now($clientZone);
    //                     $diffMs = ($batas->timestamp * 1000) - ($now->timestamp * 1000);
                        
    //                     $order->countdown_ms = max($diffMs, 0);
                        
    //                     $order->countdown_active = 
    //                         $order->countDown->status === 'tidak_dikonfirmasi' 
    //                         && $order->status !== 'ditolak'
    //                         && $order->countdown_ms > 0;
                        
    //                     $order->countdown_confirmed = 
    //                         $order->countDown->status === 'terkonfirmasi';
                        
    //                 } catch (\Exception $e) {
    //                     Log::error("Error calculating countdown for order #{$order->id_order}: " . $e->getMessage());
    //                 }
    //             }
                
    //             $order->distance_km = $this->calculateDistance($order);
    //         }
            
    //         $this->ordersCache = $orders;
    //     } else {
    //         $orders = $this->ordersCache;
    //     }

    //     return view('livewire.bengkel.bengkel-dashboard', [
    //         'bengkel' => $bengkel,
    //         'orders' => $orders,
    //         'layanan' => $this->layanan,
    //     ]);
    // }

    public function render()
    {
        $bengkel = BengkelModel::find($this->id_bengkel);
        
        if ($this->ordersCache === null || 
            ($this->lastLoadTime && now()->diffInSeconds($this->lastLoadTime) > 5)) {
            
            $orders = OrderModel::where('id_bengkel', $this->id_bengkel)
                ->with(['user', 'layananBengkel', 'countDown', 'bengkel', 'review'])
                ->orderBy('created_at', 'desc')
                ->get();

            foreach ($orders as $order) {
                $order->countdown_ms = null;
                $order->countdown_active = false;
                $order->countdown_confirmed = false;

                $order->has_review = $order->review()->exists();
                
                if ($order->countDown?->batas_konfirmasi) {
                    $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                    
                    try {
                        $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
                        $now = Carbon::now($clientZone);
                        $diffMs = ($batas->timestamp * 1000) - ($now->timestamp * 1000);
                        
                        $order->countdown_ms = max($diffMs, 0);
                        
                        $order->countdown_active = 
                            $order->countDown->status === 'tidak_dikonfirmasi' 
                            && $order->status !== 'ditolak'
                            && $order->countdown_ms > 0;
                        
                        $order->countdown_confirmed = 
                            $order->countDown->status === 'terkonfirmasi';
                        
                    } catch (\Exception $e) {
                        Log::error("Error calculating countdown for order #{$order->id_order}: " . $e->getMessage());
                    }
                }
                
                $order->distance_km = $this->calculateDistance($order);
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
