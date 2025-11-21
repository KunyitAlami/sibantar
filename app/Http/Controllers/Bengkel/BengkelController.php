<?php
namespace App\Http\Controllers\Bengkel;

use Illuminate\Http\Request;
use App\Models\BengkelModel;
use App\Models\LayananBengkelModel;
use App\Models\OrderModel;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BengkelController extends Controller
{
    private function haversineDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6371; // KM
        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);
        $a = sin($dLat/2) * sin($dLat/2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLng/2) * sin($dLng/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $earthRadius * $c; // KM
    }

    private function reverseGeocode($lat, $lng)
    {
        $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$lat}&lon={$lng}&zoom=18&addressdetails=1";
        $opts = [
            "http" => [
                "header" => "User-Agent: Laravel-App\r\n"
            ]
        ];
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        if (!$response) {
            return 'Alamat tidak ditemukan';
        }
        $data = json_decode($response);
        return $data->display_name ?? 'Alamat tidak ditemukan';
    }

    public function index($id_bengkel)
    {
        $id_Bengkel  = $id_bengkel;
        
        $bengkel = BengkelModel::findOrFail($id_bengkel);
        $orders = OrderModel::where('id_bengkel', $id_bengkel)->get();
        $layanan_bengkel = LayananBengkelModel::where('id_bengkel', $id_bengkel)->get();

        foreach ($orders as $o) {
            // DEBUG: Tampilkan data mentah
            Log::info("=== DEBUG ORDER {$o->id_order} ===");
            Log::info("User Latitude RAW: [" . $o->user_latitude . "]");
            Log::info("User Longitude RAW: [" . $o->user_longitude . "]");
            Log::info("Bengkel Latitude RAW: [" . $o->bengkel_latitude . "]");
            Log::info("Bengkel Longitude RAW: [" . $o->bengkel_longitude . "]");
            
            // Reverse geocode
            if ($o->user_latitude && $o->user_longitude) {
                $o->full_address = $this->reverseGeocode($o->user_latitude, $o->user_longitude);
            } else {
                $o->full_address = null;
            }

            // Hitung jarak
            $userLat = trim($o->user_latitude ?? '');
            $userLng = trim($o->user_longitude ?? '');
            $bengkelLat = trim($o->bengkel_latitude ?? '');
            $bengkelLng = trim($o->bengkel_longitude ?? '');

            Log::info("After Trim:");
            Log::info("userLat: [{$userLat}]");
            Log::info("userLng: [{$userLng}]");
            Log::info("bengkelLat: [{$bengkelLat}]");
            Log::info("bengkelLng: [{$bengkelLng}]");

            if (!empty($userLat) && !empty($userLng) && !empty($bengkelLat) && !empty($bengkelLng)) {
                Log::info("✓ Semua koordinat terisi");
                
                try {
                    $latBengkel = (float) str_replace(',', '.', $bengkelLat);
                    $lngBengkel = (float) str_replace(',', '.', $bengkelLng);
                    $latUser = (float) str_replace(',', '.', $userLat);
                    $lngUser = (float) str_replace(',', '.', $userLng);

                    Log::info("After Float Conversion:");
                    Log::info("latBengkel: {$latBengkel}");
                    Log::info("lngBengkel: {$lngBengkel}");
                    Log::info("latUser: {$latUser}");
                    Log::info("lngUser: {$lngUser}");

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
                        $o->distance_km = round($distance, 2);
                        
                        Log::info("✓ Distance calculated: {$o->distance_km} km");
                    } else {
                        $o->distance_km = null;
                        Log::warning("✗ Koordinat tidak valid (di luar range atau = 0)");
                    }
                } catch (\Exception $e) {
                    $o->distance_km = null;
                    Log::error("✗ Error: " . $e->getMessage());
                }
            } else {
                $o->distance_km = null;
                Log::warning("✗ Ada koordinat yang kosong");
            }
            
            Log::info("=== END DEBUG ===\n");
        }

        // Statistik
        $ordersToday = OrderModel::where('id_bengkel', $id_bengkel)
            ->whereDate('created_at', Carbon::today())
            ->get();

        $totalOrdersToday = $ordersToday->count();
        $totalIncomeToday = $ordersToday->sum('total_bayar');
        $LayananTotal = LayananBengkelModel::where('id_bengkel', $id_bengkel)->count();

        return view('bengkel.dashboard.index', compact(
            'id_Bengkel',
            'bengkel',
            'orders',
            'layanan_bengkel',
            'ordersToday',
            'totalOrdersToday',
            'totalIncomeToday',
            'LayananTotal'
        ));
    }


    public function orderTracking($orderId)
    {
        // Bisa langsung render Livewire page
        return view('bengkel.dashboard.final-price', compact('orderId'));
    }

}