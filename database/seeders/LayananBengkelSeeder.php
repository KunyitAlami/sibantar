<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


// library wajib seeder
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash; 
use Faker\Factory as Faker;

class LayananBengkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(): void
    // {
    //     //
    // }

public function run()
    {
        $faker = Faker::create('id_ID');
        $bengkelIds = range(1, 30); 
        $categories = ['Motor', 'Mobil', 'Truk'];
        $serviceNames = ['Ban Bocor', 'Aki Tekor', 'Mesin Mati', 'Kecelakaan', 'Lainnya'];
        $data = [];

        foreach ($bengkelIds as $bengkelId) {
            foreach ($categories as $category) {
                foreach ($serviceNames as $serviceName) {

                    $minPrice = 0;
                    $maxPrice = 0;

                    if ($category === 'Motor') {
                        $minPrice = 15000; 
                        $maxPrice = 75000; 
                    } elseif ($category === 'Mobil') {
                        $minPrice = 30000; 
                        $maxPrice = 150000; 
                    } elseif ($category === 'Truk') {
                        $minPrice = 50000; 
                        $maxPrice = 370000;
                    }

                    $hargaAwal = $faker->numberBetween($minPrice, $maxPrice / 2);
                    $hargaAkhir = $faker->numberBetween($hargaAwal + 5000, $maxPrice);
                    
                    $data[] = [
                        'id_bengkel' => $bengkelId,
                        'nama_layanan' => $serviceName,
                        'deskripsi' => $faker->paragraph(2),
                        'harga_awal' => (string)$hargaAwal,
                        'harga_akhir' => (string)$hargaAkhir,
                        'kategori' => $category,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        DB::table('layanan_bengkel')->insert($data);
    }

}
