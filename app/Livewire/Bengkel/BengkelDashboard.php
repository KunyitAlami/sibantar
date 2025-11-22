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

    public function handleCountdownAction($orderId)
    {
        $order = OrderModel::with('countDown')->find($orderId);
        if (!$order || !$order->countDown) return;

        if ($order->countDown->status === 'pending') {
            $order->countDown->update(['status' => 'tidak_dikonfirmasi']);
            $order->update(['status' => 'ditolak']);
        }
    }


    public function acceptOrder($orderId)
    {
        $order = OrderModel::with('countDown')->find($orderId);
        if (!$order) return;

        $order->countDown->update(['status' => 'terkonfirmasi']);
        $order->update(['status' => 'pending']);

        $tracking = OrderTrackingModel::where('id_order', $orderId)->first();
        if (!$tracking) {
            OrderTrackingModel::create([
                'id_order' => $orderId,
                'current_step' => 1, 
                'finalPrice' => null,
            ]);
        }
    }

    public function rejectOrder($orderId)
    {
        $order = OrderModel::with('countDown')->find($orderId);
        if (!$order) return;

        $order->countDown->update(['status' => 'terkonfirmasi']);
        $order->update(['status' => 'ditolak']);
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
            ->with('user','layananBengkel', 'countDown')
            ->get();

        // Hitung jarak dan countdown untuk setiap order
        foreach ($orders as $order) {
            $order->countdown_active = $order->countDown?->status === 'pending';
            $order->distance_km = $this->calculateDistance($order);

            if ($order->countDown?->batas_konfirmasi) {
                $clientZone = $order->client_timezone ?? 'Asia/Makassar';
                $batas = Carbon::parse($order->countDown->batas_konfirmasi, $clientZone);
                $now = Carbon::now($clientZone);
                $order->countdown_ms = max(($batas->timestamp * 1000) - ($now->timestamp * 1000), 0);
            } else {
                $order->countdown_ms = null;
            }
        }

        return view('livewire.bengkel.bengkel-dashboard', [
            'bengkel' => $bengkel,
            'orders' => $orders,
            'layanan' => $this->layanan, // <- pakai property, bukan query baru
        ]);
    }

}