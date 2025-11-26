<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OrderTrackingSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $orders = DB::table('order')->select('id_order', 'total_bayar', 'estimasi_harga')->get();
        $data = [];
        $counter = 1;

        foreach ($orders as $order) {
            $finalPrice = $order->total_bayar - $faker->numberBetween(7000, 9500);
            $servicePrice = $order->estimasi_harga;
            $deliveryFee = $finalPrice - $servicePrice;

            $data[] = [
                'id_order' => $order->id_order,
                'current_step' => 5,
                'finalPrice' => $finalPrice,
                // 'servicePrice' => $servicePrice,
                // 'deliveryFee' => $deliveryFee,
                'midtrans_order_id' => $counter,
                'midtrans_status' => 'settlement',
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $counter++;
        }

        DB::table('order_tracking')->insert($data);
    }
}
