<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// library wajib seeder
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class BengkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bengkel')->insert([
            [
                'link_gmaps' => 'https://goo.gl/maps/abcd1234',
                'nama_bengkel' => 'Bengkel Jaya Motor',
                'id_user'=>6,
                'kecamatan' => 'Banjarmasin Utara',
                'alamat_lengkap' => 'Jl. Pangeran Antasari No.12',
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
                'jam_operasional' => '08:00-17:00',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_gmaps' => 'https://goo.gl/maps/efgh5678',
                'nama_bengkel' => 'Bengkel Motor Sejahtera',
                'id_user'=>7,
                'kecamatan' => 'Banjarmasin Tengah',
                'alamat_lengkap' => 'Jl. Ahmad Yani No.45',
                'jam_buka' => '09:00',
                'jam_tutup' => '18:00',
                'jam_operasional' => '09:00-18:00',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_gmaps' => 'https://goo.gl/maps/ijkl9012',
                'nama_bengkel' => 'Bengkel Mandiri',
                'id_user'=>8,
                'kecamatan' => 'Banjarmasin Selatan',
                'alamat_lengkap' => 'Jl. Gatot Subroto No.7',
                'jam_buka' => '07:30',
                'jam_tutup' => '16:30',
                'jam_operasional' => '07:30-16:30',
                'status' => 'belum_aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_gmaps' => 'https://goo.gl/maps/mnop3456',
                'nama_bengkel' => 'Bengkel Bersama',
                'id_user'=>9,
                'kecamatan' => 'Banjarmasin Timur',
                'alamat_lengkap' => 'Jl. Lambung Mangkurat No.88',
                'jam_buka' => '08:00',
                'jam_tutup' => '17:00',
                'jam_operasional' => '08:00-17:00',
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'link_gmaps' => 'https://goo.gl/maps/qrst7890',
                'nama_bengkel' => 'Bengkel Prima',
                'id_user'=>10,
                'kecamatan' => 'Banjarmasin Barat',
                'alamat_lengkap' => 'Jl. A. Yani Km.5',
                'jam_buka' => '08:30',
                'jam_tutup' => '17:30',
                'jam_operasional' => '08:30-17:30',
                'status' => 'belum_aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
