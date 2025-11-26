<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BengkelModel;
use App\Models\LayananBengkelModel;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $orders = [];

        $userIds = [37, 38, 39];
        $bengkels = BengkelModel::all(); 

        foreach ($bengkels as $bengkel) {
            $startLayananId = ($bengkel->id_bengkel - 1) * 12 + 1;
            $endLayananId = $startLayananId + 11;

            for ($layananId = $startLayananId; $layananId <= $endLayananId; $layananId++) {
                $layanan = LayananBengkelModel::find($layananId);
                if (!$layanan) continue;

                $orders[] = [
                    'id_user' => $faker->randomElement($userIds),
                    'id_bengkel' => $bengkel->id_bengkel,
                    'id_layanan_bengkel' => $layananId,
                    'user_latitude' => $faker->latitude(-3.5, -2.7),
                    'user_longitude' => $faker->longitude(114.4, 115.0),
                    'bengkel_latitude' => $bengkel->latitude,
                    'bengkel_longitude' => $bengkel->longitude,
                    'status' => 'selesai',
                    'estimasi_harga' => $layanan->harga_akhir,
                    'total_bayar' => $layanan->harga_akhir + $faker->numberBetween(1000, 17500),
                    'notes' => $faker->sentence(),
                    'client_timezone' => 'Asia/Makassar',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('order')->insert($orders);
    }
}
