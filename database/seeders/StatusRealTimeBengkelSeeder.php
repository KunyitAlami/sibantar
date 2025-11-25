<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// library wajib seeder
use Illuminate\Support\Facades\DB;

class StatusRealTimeBengkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusBengkel = [
            ['id_bengkel' => 1, 'status'=>'buka',],
            ['id_bengkel' => 2, 'status'=>'buka',],
            ['id_bengkel' => 3, 'status'=>'buka',],
            ['id_bengkel' => 4, 'status'=>'buka',],
            ['id_bengkel' => 5, 'status'=>'buka',],

            ['id_bengkel' => 6, 'status'=>'buka',],
            ['id_bengkel' => 7, 'status'=>'buka',],
            ['id_bengkel' => 8, 'status'=>'buka',],
            ['id_bengkel' => 9, 'status'=>'buka',],
            ['id_bengkel' => 10, 'status'=>'buka',],

            ['id_bengkel' => 11, 'status'=>'buka',],
            ['id_bengkel' => 12, 'status'=>'buka',],
            ['id_bengkel' => 13, 'status'=>'buka',],
            ['id_bengkel' => 14, 'status'=>'buka',],
            ['id_bengkel' => 15, 'status'=>'buka',],

            ['id_bengkel' => 16, 'status'=>'buka',],
            ['id_bengkel' => 17, 'status'=>'buka',],
            ['id_bengkel' => 18, 'status'=>'buka',],
            ['id_bengkel' => 19, 'status'=>'buka',],
            ['id_bengkel' => 20, 'status'=>'buka',],

            ['id_bengkel' => 21, 'status'=>'buka',],
            ['id_bengkel' => 22, 'status'=>'buka',],
            ['id_bengkel' => 23, 'status'=>'buka',],
            ['id_bengkel' => 24, 'status'=>'buka',],
            ['id_bengkel' => 25, 'status'=>'buka',],

            ['id_bengkel' => 26, 'status'=>'buka',],
            ['id_bengkel' => 27, 'status'=>'buka',],
            ['id_bengkel' => 28, 'status'=>'buka',],
            ['id_bengkel' => 29, 'status'=>'buka',],
            ['id_bengkel' => 30, 'status'=>'buka',],
    
        ];

        DB::table('status_real_time_bengkel')->insert($statusBengkel);
    }
}
