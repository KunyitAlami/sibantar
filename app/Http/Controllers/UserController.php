<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BengkelModel;
use App\Models\LayananBengkelModel;
use App\Models\OrderModel;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CountDownModel;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'vehicle_type' => 'required',
            'nama_layanan' => 'required',
            'latitude'     => 'required|numeric',
            'longitude'    => 'required|numeric',
        ]);

        $vehicleType = $request->vehicle_type;
        $namaLayanan = $request->nama_layanan; 
        $userLat     = $request->latitude;
        $userLng     = $request->longitude;

        Log::info('Search Request', [
            'vehicle' => $vehicleType,
            'layanan' => $namaLayanan,
            'user_lat' => $userLat,
            'user_lng' => $userLng
        ]);

        $bengkel = BengkelModel::with(['layananBengkel' => function($query) use ($vehicleType) {
                $query->where('kategori', $vehicleType);
            }])
            ->get();

        Log::info('Total bengkel (tanpa filter status): ' . $bengkel->count());
        
        if ($bengkel->count() === 0) {
            $bengkel = BengkelModel::with('layananBengkel')->get();
            Log::info('Total bengkel (dengan semua layanan): ' . $bengkel->count());
        }

        $bengkel = $bengkel->map(function($item) use ($userLat, $userLng, $vehicleType, $namaLayanan) {
            $coordinates = $this->parseGoogleMapsLink($item->link_gmaps);
            
            if ($coordinates) {
                $bengkelLat = $coordinates['lat'];
                $bengkelLng = $coordinates['lng'];
                $distance = $this->calculateDistance($userLat, $userLng, $bengkelLat, $bengkelLng);
                
                $item->latitude = $bengkelLat;
                $item->longitude = $bengkelLng;
                $item->distance_km = round($distance, 1);
                $item->distance_text = $distance < 1 
                    ? round($distance * 1000) . ' m' 
                    : round($distance, 1) . ' km';
                $timeMinutes = round(($distance / 30) * 60);
                $item->estimated_time = $timeMinutes < 60 
                    ? $timeMinutes . ' menit'
                    : floor($timeMinutes / 60) . ' jam ' . ($timeMinutes % 60) . ' menit';
                
                Log::info("Bengkel {$item->nama_bengkel}: lat={$bengkelLat}, lng={$bengkelLng}, distance={$distance}km");
            } else {
                Log::warning("Cannot parse coordinates for bengkel: {$item->nama_bengkel}, link: {$item->link_gmaps}");
                $item->latitude = null;
                $item->longitude = null;
                $item->distance_km = 999;
                $item->distance_text = 'N/A';
                $item->estimated_time = 'N/A';
            }

            $relevantLayanan = $item->layananBengkel
                ->where('kategori', $vehicleType)
                ->filter(function($layanan) use ($namaLayanan) {
                    return stripos($layanan->nama_layanan, $namaLayanan) !== false;
                })
                ->first();

            if (!$relevantLayanan) {
                $relevantLayanan = $item->layananBengkel
                    ->where('kategori', $vehicleType)
                    ->first();
            }

            if (!$relevantLayanan) {
                $relevantLayanan = $item->layananBengkel->first();
            }

            $item->relevant_layanan = $relevantLayanan;
            $item->estimasi_harga_display = $relevantLayanan 
                ? 'Rp ' . number_format($relevantLayanan->harga_awal, 0, ',', '.') . ' - Rp ' . number_format($relevantLayanan->harga_akhir, 0, ',', '.')
                : 'Hubungi Bengkel';

            $item->average_rating = 4.5 + (rand(0, 10) / 10);
            $item->total_reviews = rand(50, 200);

            return $item;
        });

        $bengkel = $bengkel->filter(function($item) {
            return $item->latitude !== null && $item->longitude !== null;
        });

        $bengkel = $bengkel->sortBy('distance_km')->values();

        Log::info('Bengkel with valid coordinates: ' . $bengkel->count());

        $bengkelDataForJs = $bengkel->map(function($item) {
            return [
                'id' => $item->id_bengkel,
                'name' => $item->nama_bengkel,
                'lat' => $item->latitude,
                'lng' => $item->longitude,
                'rating' => $item->average_rating,
                'reviews' => $item->total_reviews,
                'distance' => $item->distance_text,
                'distance_km' => $item->distance_km,
                'price' => $item->estimasi_harga_display, 
                'layanan' => $item->relevant_layanan->nama_layanan ?? 'Lainnya', 
            ];
        })->values()->toArray();

        return view('user.search', [
            'vehicleType' => $vehicleType,
            'nama_layanan' => $namaLayanan,
            'latitude'    => $userLat,
            'longitude'   => $userLng,
            'bengkelList' => $bengkel,
            'bengkelDataJs' => $bengkelDataForJs,
        ]);
    }

    private function parseGoogleMapsLink($url)
    {
        if (empty($url)) {
            return null;
        }

        if (preg_match('/[?&]q=(-?\d+\.?\d*),(-?\d+\.?\d*)/', $url, $matches)) {
            return ['lat' => floatval($matches[1]), 'lng' => floatval($matches[2])];
        }

        if (preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $url, $matches)) {
            return ['lat' => floatval($matches[1]), 'lng' => floatval($matches[2])];
        }

        if (preg_match('/\/place\/(-?\d+\.?\d*),(-?\d+\.?\d*)/', $url, $matches)) {
            return ['lat' => floatval($matches[1]), 'lng' => floatval($matches[2])];
        }

        if (preg_match('/[?&]ll=(-?\d+\.?\d*),(-?\d+\.?\d*)/', $url, $matches)) {
            return ['lat' => floatval($matches[1]), 'lng' => floatval($matches[2])];
        }

        if (preg_match('/(-?\d+\.\d{4,}),(-?\d+\.\d{4,})/', $url, $matches)) {
            return ['lat' => floatval($matches[1]), 'lng' => floatval($matches[2])];
        }

        return null;
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;
    }

    public function detail_bengkel($id_bengkel, $id_layanan, Request $request)
    {
        $bengkel = BengkelModel::with('layananBengkel')->findOrFail($id_bengkel);
        $layanan_bengkel = LayananBengkelModel::where('id_layanan_bengkel', $id_layanan)->firstOrFail();
        $backUrl = $request->get('back');

        return view('user.detail', [
            'bengkel' => $bengkel,
            'layanan_bengkel' => $layanan_bengkel,
            'backUrl' => $backUrl
        ]);
    }

   public function pesan(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_bengkel' => 'required|exists:bengkel,id_bengkel',
                'id_layanan_bengkel' => 'required|exists:layanan_bengkel,id_layanan_bengkel',
                'user_latitude' => 'required',
                'user_longitude' => 'required',
                'bengkel_latitude' => 'required',
                'bengkel_longitude' => 'required',
                'estimasi_harga' => 'required',
                'total_bayar' => 'required',
                'notes' => 'nullable|string',
                'client_timezone' => 'required|string'
            ]);

            $order = OrderModel::create([
                'id_user' => Auth::id(),
                'id_bengkel' => $validated['id_bengkel'],
                'id_layanan_bengkel' => $validated['id_layanan_bengkel'],
                'user_latitude' => $validated['user_latitude'],
                'user_longitude' => $validated['user_longitude'],
                'bengkel_latitude' => $validated['bengkel_latitude'],
                'bengkel_longitude' => $validated['bengkel_longitude'],
                'status' => 'menunggu_konfirmasi',
                'estimasi_harga' => $validated['estimasi_harga'],
                'total_bayar' => $validated['total_bayar'],
                'notes' => $validated['notes'] ?? null,
                'client_timezone' => $validated['client_timezone']
            ]);
            $clientZone = $validated['client_timezone'];
            $now = Carbon::now($clientZone);
            $batas = $now->copy()->addMinutes(5);

            CountDownModel::create([
                'id_order' => $order->id_order,
                'status' => 'tidak_dikonfirmasi',
                'batas_konfirmasi' => $batas->toDateTimeString(),
            ]);

            Log::info("Order created with timezone", [
                'order_id' => $order->id_order,
                'client_timezone' => $clientZone,
                'batas_konfirmasi' => $batas->toDateTimeString()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pesanan berhasil dibuat',
                'redirect_url' => route('user.waiting_confirmation', [
                    'order_id' => $order->id_order,
                ])
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dikirim tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error creating order: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function waiting_confirmation($order_id)
    {
        $order = OrderModel::with(['bengkel', 'layananBengkel', 'user', 'countDown'])
            ->where('id_order', $order_id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        return view('user.waiting-confirmation', [
            'order' => $order,
            'orderId' => $order->id_order, 
        ]);
    }


    public function konfirmasi_pesanan($id_bengkel, $id_layanan, Request $request)
    {
        $bengkel = BengkelModel::with('layananBengkel')->findOrFail($id_bengkel);
        $layanan_bengkel = LayananBengkelModel::where('id_layanan_bengkel', $id_layanan)->firstOrFail();
        $userId = Auth::id();

        $coordinates = $this->parseGoogleMapsLink($bengkel->link_gmaps);
        if ($coordinates) {
            $bengkel->latitude = $coordinates['lat'];
            $bengkel->longitude = $coordinates['lng'];
        } else {
            Log::warning("Cannot parse coordinates for bengkel: {$bengkel->nama_bengkel}");
            $bengkel->latitude = null;
            $bengkel->longitude = null;
        }

        $backUrl = $request->get('back');

        return view('user.confirmation', [
            'bengkel' => $bengkel,
            'layanan_bengkel' => $layanan_bengkel,
            'backUrl' => $backUrl,
            'id_user' => $userId,
        ]);
    }

    public function orderTracking($orderId)
    {
        $status = request()->get('status', 'waiting');

        return view('user.order-tracking', compact('orderId', 'status'));
    }


    public function history($id_user)
    {
        if (Auth::id() != $id_user) {
            abort(403, 'Unauthorized access');
        }

        $orders = OrderModel::with(['bengkel', 'layananBengkel', 'user'])
            ->where('id_user', $id_user)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.history', [
            'orders' => $orders,
            'id_user' => $id_user,
        ]);
    }
}
