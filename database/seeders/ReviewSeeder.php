<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Review dummy untuk bengkel
        $reviews = [
            [
                'booking_id' => 1,
                'user_id' => 1,
                'bengkel_id' => 1,
                'rating' => 5,
                'comment' => 'Pelayanan sangat cepat dan ramah!',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'booking_id' => 2,
                'user_id' => 1,
                'bengkel_id' => 1,
                'rating' => 5,
                'comment' => 'Mekanik profesional, hasil kerja rapi',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'booking_id' => 3,
                'user_id' => 1,
                'bengkel_id' => 1,
                'rating' => 4,
                'comment' => 'Bagus, tapi agak lama menunggu',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
        ];

        DB::table('reviews')->insert($reviews);
    }
}
