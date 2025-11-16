<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// library wajib seeder
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk hashing password

class CalonBengkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calonBengkelData = [
            [
                'username' => 'bengkeljaya',
                'role' => 'bengkel',
                'email' => 'jaya.service@example.com',
                'password' => Hash::make('password123'), 
                'wa_number' => '081234567890',
                'link_gmaps' => 'https://maps.app.goo.gl/example1',
                'nama_bengkel' => 'Bengkel Jaya Motor',
                'kecamatan' => 'Banjarmasin Utara',
                'alamat_lengkap' => 'Jl. RS Fatmawati No. 10',
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
                'penjelasan_bengkel' => 'Spesialis servis rutin dan ganti oli untuk semua jenis motor.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'servicecepat',
                'role' => 'bengkel',
                'email' => 'cepat.service@example.com',
                'password' => Hash::make('password456'),
                'wa_number' => '085678901234',
                'link_gmaps' => 'https://maps.app.goo.gl/example2',
                'nama_bengkel' => 'Service Cepat Mobil',
                'kecamatan' => 'Banjarmasin Tengah',
                'alamat_lengkap' => 'Jl. Melawai Raya No. 5',
                'jam_buka' => '09:00',
                'jam_tutup' => '20:00',
                'penjelasan_bengkel' => 'Menerima perbaikan darurat dan ganti ban mobil.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'bengkeljaya',
                'role' => 'bengkel',
                'email' => 'jaya.service@example.com',
                'password' => Hash::make('password123'), 
                'wa_number' => '081234567890',
                'link_gmaps' => 'https://maps.app.goo.gl/example1',
                'nama_bengkel' => 'Bengkel Jaya Motor',
                'kecamatan' => 'Banjarmasin Timur',
                'alamat_lengkap' => 'Jl. RS Fatmawati Dua No. 109',
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
                'penjelasan_bengkel' => 'Spesialis servis rutin dan ganti oli untuk semua jenis motor.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'servicecepat',
                'role' => 'bengkel',
                'email' => 'cepat.service@example.com',
                'password' => Hash::make('password456'), // Bengkel 2
                'wa_number' => '085678901234',
                'link_gmaps' => 'https://maps.app.goo.gl/example2',
                'nama_bengkel' => 'Service Cepat Mobil',
                'kecamatan' => 'Banjarmasin Barat',
                'alamat_lengkap' => 'Jl. Melawai Raya No. 5, Jakarta Selatan',
                'jam_buka' => '09:00',
                'jam_tutup' => '20:00',
                
                'penjelasan_bengkel' => 'Menerima perbaikan darurat dan ganti ban mobil.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'otomax',
                'role' => 'bengkel',
                'email' => 'otomax.service@example.com',
                'password' => Hash::make('otomaxpass'), // Bengkel 3
                'wa_number' => '087811223344',
                'link_gmaps' => 'http://googleusercontent.com/maps.google.com/2',
                'nama_bengkel' => 'Otomax Auto Care',
                'kecamatan' => 'Setiabudi',
                'alamat_lengkap' => 'Jl. HR Rasuna Said Kav. 11, Jakarta Selatan',
                'jam_buka' => '10:00',
                'jam_tutup' => '18:00',
                'penjelasan_bengkel' => 'Bengkel premium spesialis detailing dan perawatan cat mobil.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'motoservis',
                'role' => 'bengkel',
                'email' => 'motoservice@example.com',
                'password' => Hash::make('motoservpass'), // Bengkel 4
                'wa_number' => '082199887766',
                'link_gmaps' => 'http://googleusercontent.com/maps.google.com/3',
                'nama_bengkel' => 'Moto Servis Cepat',
                'kecamatan' => 'Banjarmasin Tengah',
                'alamat_lengkap' => 'Jl. Abdullah Syafei No. 3A',
                'jam_buka' => '07:00',
                'jam_tutup' => '15:00',
                'penjelasan_bengkel' => 'Melayani service ringan motor bebek dan matic, buka paling pagi.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'banmaster',
                'role' => 'bengkel',
                'email' => 'banmaster@example.com',
                'password' => Hash::make('banmasterpass'), // Bengkel 5
                'wa_number' => '081100220044',
                'link_gmaps' => 'http://googleusercontent.com/maps.google.com/4',
                'nama_bengkel' => 'Banjarmasin Utara',
                'kecamatan' => 'Pasar Minggu',
                'alamat_lengkap' => 'Jl. Raya Ragunan No. 20',
                'jam_buka' => '09:30',
                'jam_tutup' => '18:30',
                
                'penjelasan_bengkel' => 'Spesialis spooring, balancing, dan ganti ban mobil segala ukuran.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'username' => 'elektrofix',
                'role' => 'bengkel',
                'email' => 'elektrofix@example.com',
                'password' => Hash::make('elektrofixpass'), // Bengkel 6
                'wa_number' => '085244332211',
                'link_gmaps' => 'http://googleusercontent.com/maps.google.com/5',
                'nama_bengkel' => 'Elektro Fix & AC',
                'kecamatan' => 'Banjarmasin Selatan',
                'alamat_lengkap' => 'Jl. Moch. Kahfi II No. 55',
                'jam_buka' => '08:00',
                'jam_tutup' => '16:00',
                'penjelasan_bengkel' => 'Melayani perbaikan kelistrikan mobil dan servis AC mobil.',
                'status' => 'belum_diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('calon_bengkel')->insert($calonBengkelData);
    }
}