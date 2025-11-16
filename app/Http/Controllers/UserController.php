<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BengkelModel;
use App\Models\LayananBengkelModel;
use Illuminate\Routing\Controller;

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

        $bengkel = BengkelModel::where('status', 'aktif')
            ->with(['layananBengkel' => function($query) use ($vehicleType) {
                $query->where('kategori', $vehicleType);
            }])
            ->get();

        $bengkel = $bengkel->map(function($item) use ($userLat, $userLng, $vehicleType, $namaLayanan) {
            preg_match('/q=(-?\d+\.?\d*),(-?\d+\.?\d*)/', $item->link_gmaps, $matches);
            
            if (count($matches) >= 3) {
                $bengkelLat = floatval($matches[1]);
                $bengkelLng = floatval($matches[2]);
                $distance = $this->calculateDistance($userLat, $userLng, $bengkelLat, $bengkelLng);
                
                $item->latitude = $bengkelLat;
                $item->longitude = $bengkelLng;
                $item->distance_km = round($distance, 1);
                $item->distance_text = $distance < 1 
                    ? round($distance * 1000) . ' m' 
                    : round($distance, 1) . ' km';
                $timeMinutes = round(($distance / 30) * 60);
                $item->estimated_time = $timeMinutes . ' menit';
            } else {
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

        $bengkel = $bengkel->sortBy('distance_km')->values();

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

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; 
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;
        return $distance;
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

    public function pesan(){}
}