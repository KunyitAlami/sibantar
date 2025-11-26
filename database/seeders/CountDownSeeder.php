<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountDownSeeder extends Seeder
{
    public function run(): void
    {
        $orders = DB::table('order')->select('id_order')->get();
        $data = [];

        foreach ($orders as $order) {
            $data[] = [
                'id_order' => $order->id_order,
                'status' => 'terkonfirmasi',
                'waktu_konfirmasi' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('count_down')->insert($data);
    }
}
