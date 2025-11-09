<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bookings')->insert([
            [
                'booking_number' => 'SB' . time() . '001',
                'user_id' => 1, // Admin sebagai user pertama
                'bengkel_id' => 1, // Bengkel pertama
                'vehicle_type' => 'Motor',
                'problem_type' => 'Ban Bocor',
                'status' => 'pending',
                'estimated_price_min' => 25000,
                'estimated_price_max' => 50000,
                'notes' => 'Ban depan bocor, perlu tambal',
                'accepted_at' => null,
                'completed_at' => null,
                'created_at' => Carbon::now()->subHours(2),
                'updated_at' => Carbon::now()->subHours(2),
            ],
            [
                'booking_number' => 'SB' . (time() + 1) . '002',
                'user_id' => 1,
                'bengkel_id' => 1,
                'vehicle_type' => 'Motor',
                'problem_type' => 'Oli Bocor',
                'status' => 'accepted',
                'estimated_price_min' => 50000,
                'estimated_price_max' => 100000,
                'notes' => 'Oli mesin bocor',
                'accepted_at' => Carbon::now()->subHour(),
                'completed_at' => null,
                'created_at' => Carbon::now()->subHours(3),
                'updated_at' => Carbon::now()->subHour(),
            ],
            [
                'booking_number' => 'SB' . (time() + 2) . '003',
                'user_id' => 1,
                'bengkel_id' => 1,
                'vehicle_type' => 'Motor',
                'problem_type' => 'Mesin Overheat',
                'status' => 'on_progress',
                'estimated_price_min' => 100000,
                'estimated_price_max' => 200000,
                'notes' => 'Mesin panas berlebihan',
                'accepted_at' => Carbon::now()->subHours(2),
                'completed_at' => null,
                'created_at' => Carbon::now()->subHours(4),
                'updated_at' => Carbon::now()->subMinutes(30),
            ],
        ]);
    }
}
