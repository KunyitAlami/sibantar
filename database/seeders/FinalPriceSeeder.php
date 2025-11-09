<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinalPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Final price untuk booking yang sudah on_progress
        DB::table('final_prices')->insert([
            [
                'booking_id' => 3, // Booking Mesin Overheat
                'service_price' => 150000,
                'delivery_fee' => 20000,
                'night_fee' => 0,
                'total' => 170000,
                'notes' => 'Sudah termasuk ganti spare part',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
