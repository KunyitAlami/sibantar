<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $orders = DB::table('order')->select('id_order', 'id_user', 'id_bengkel')->get();
        $data = [];

        $comments = [
            "Pelayanan sangat ramah dan cepat.",
            "Sangat puas dengan hasil layanan.",
            "Bengkel profesional dan bersih.",
            "Teknisi ahli dan sabar menjelaskan.",
            "Proses cepat, hasil memuaskan.",
            "Harga sesuai, kualitas top.",
            "Rekomendasi untuk semua kendaraan.",
            "Sangat membantu dan informatif.",
            "Bengkel terpercaya, tidak mengecewakan.",
            "Karyawan ramah dan sopan.",
            "Pelayanan melebihi ekspektasi.",
            "Layanan rapi dan tepat waktu.",
            "Tempat nyaman dan bersih.",
            "Teknisi berpengalaman dan handal.",
            "Sangat puas, pasti kembali lagi."
        ];

        foreach ($orders as $order) {
            $ratingBengkel = $faker->randomElement([4, 4, 4, 4, 5, 5, 5]);
            $ratingLayanan = $faker->randomElement([4, 4, 4, 4, 5, 5, 5]);

            $data[] = [
                'id_order' => $order->id_order,
                'id_user' => $order->id_user,
                'id_bengkel' => $order->id_bengkel,
                'ratingBengkel' => $ratingBengkel,
                'ratingLayanan' => $ratingLayanan,
                'comment' => $faker->randomElement($comments),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('reviews')->insert($data);
    }
}
