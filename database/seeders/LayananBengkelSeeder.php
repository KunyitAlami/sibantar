<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash; 
use Faker\Factory as Faker;

class LayananBengkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $bengkelIds = range(1, 30); 
        $categories = ['Motor', 'Mobil', 'Truk'];
        $serviceNames = ['Ban Bocor', 'Aki Tekor', 'Mesin Mati', 'Kecelakaan'];
        
        $descriptions = [
            'Motor' => [
                'Ban Bocor' => [
                    'Ganti ban motor yang bocor dengan cepat dan aman.',
                    'Perbaikan ban motor agar bisa jalan kembali.',
                    'Servis ban motor dengan kualitas terbaik.'
                ],
                'Aki Tekor' => [
                    'Ganti aki motor agar starter kembali normal.',
                    'Periksa dan servis aki motor yang tekor.',
                    'Servis kelistrikan motor, khususnya aki.'
                ],
                'Mesin Mati' => [
                    'Perbaikan mesin motor mati total.',
                    'Servis rutin mesin motor agar kembali normal.',
                    'Diagnosis dan perbaikan masalah mesin motor.'
                ],
                'Kecelakaan' => [
                    'Perbaikan body motor akibat kecelakaan ringan.',
                    'Servis motor pasca kecelakaan agar aman dikendarai.',
                    'Perbaikan komponen motor setelah tabrakan.'
                ],
            ],
            'Mobil' => [
                'Ban Bocor' => [
                    'Ganti ban mobil bocor dengan cepat.',
                    'Periksa dan servis ban mobil agar aman di jalan.',
                    'Servis ban mobil termasuk balancing dan spooring.'
                ],
                'Aki Tekor' => [
                    'Ganti aki mobil agar starter kembali normal.',
                    'Periksa dan servis aki mobil yang tekor.',
                    'Servis sistem kelistrikan mobil terkait aki.'
                ],
                'Mesin Mati' => [
                    'Perbaikan mesin mobil mati total.',
                    'Servis rutin mesin mobil agar kembali optimal.',
                    'Diagnosis masalah mesin mobil dan perbaikan.'
                ],
                'Kecelakaan' => [
                    'Perbaikan body mobil akibat kecelakaan ringan.',
                    'Servis mobil pasca kecelakaan agar aman dikendarai.',
                    'Perbaikan komponen mobil setelah tabrakan.'
                ],
            ],
            'Truk' => [
                'Ban Bocor' => [
                    'Ganti ban truk bocor agar aman angkut barang.',
                    'Servis ban truk dan periksa tekanan ban.',
                    'Perbaikan ban truk termasuk balancing.'
                ],
                'Aki Tekor' => [
                    'Ganti aki truk agar starter kembali normal.',
                    'Periksa dan servis aki truk yang tekor.',
                    'Servis kelistrikan truk terkait aki dan alternator.'
                ],
                'Mesin Mati' => [
                    'Perbaikan mesin truk mati total.',
                    'Servis rutin mesin truk agar siap angkut beban.',
                    'Diagnosis masalah mesin truk dan perbaikan cepat.'
                ],
                'Kecelakaan' => [
                    'Perbaikan body truk pasca kecelakaan ringan.',
                    'Servis truk agar kembali layak jalan setelah tabrakan.',
                    'Perbaikan komponen penting truk akibat kecelakaan.'
                ],
            ],
        ];

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

                    $hargaAwal = $faker->numberBetween($minPrice, (int)($maxPrice / 2));
                    $hargaAkhir = $faker->numberBetween($hargaAwal + 5000, $maxPrice);

                    $deskripsiPilihan = $descriptions[$category][$serviceName];
                    $deskripsi = $faker->randomElement($deskripsiPilihan);
                    
                    $data[] = [
                        'id_bengkel' => $bengkelId,
                        'nama_layanan' => $serviceName,
                        'deskripsi' => $deskripsi,
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