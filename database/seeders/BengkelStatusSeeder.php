<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// library wajib seeder
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash; 

class BengkelStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statusData = [];

        for ($i = 1; $i <= 30; $i++) {
            $statusData[] = [
                'id_bengkel' => $i,
                'status' => 'buka',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('bengkel_status')->insert($statusData);
    }
}
