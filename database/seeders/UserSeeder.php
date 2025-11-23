<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// library wajib seeder
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            // ADMIN ACCOUNTS
            ['username'=>'admin', 'skor'=>0,  'role'=>'admin' ,'email'=>'admin@sibantar.com', 'password' => Hash::make('admin123'), 'wa_number'=>'081234567890', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'randyfebrian', 'skor'=>0,'role'=>'admin' ,'email'=>'2310817110013@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'muhammadrizky', 'skor'=>0,'role'=>'admin' ,'email'=>'2310817310011@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'zahranabila', 'skor'=>0,'role'=>'admin' ,'email'=>'2310817110011@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'ghanimudzakir', 'skor'=>0,'role'=>'admin' ,'email'=>'2310817320007@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'erikamaulidiya', 'skor'=>0,'role'=>'admin' ,'email'=>'dosentester', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],

            // BENGKEL ACCOUNT
            // buat bengkel awalan
            ['username'=>'bengkel_jaya_motor', 'skor'=>1,   'role'=>'bengkel', 'email'=>'bengkeljaya@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567891', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_motor_sejahtera','skor'=>1,    'role'=>'bengkel', 'email'=>'bengkelmotor@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567892', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_mandiri', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkelmandiri@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567893', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_bersama', 'skor'=>1, 'role'=>'bengkel', 'email'=>'bengkelbersama@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567894', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_prima', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkelprima@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567895', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],


            // kecamatan utara
            ['username'=>'bengkel_resmi_utara_satu','skor'=>1,   'role'=>'bengkel', 'email'=>'bengkel1@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567891', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_utara_dua', 'skor'=>1,   'role'=>'bengkel', 'email'=>'bengkel2@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567892', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_utara_tiga', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel3@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567893', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_utara_empat', 'skor'=>1, 'role'=>'bengkel', 'email'=>'bengkel4@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567894', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_utara_lima',  'skor'=>1, 'role'=>'bengkel', 'email'=>'bengkel5@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567895', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],


            // kecamatan tengah
            ['username'=>'bengkel_resmi_tengah_satu','skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel6@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567896', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_tengah_dua', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel7@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567897', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_tengah_tiga', 'skor'=>1, 'role'=>'bengkel', 'email'=>'bengkel8@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567898', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_tengah_empat','skor'=>1, 'role'=>'bengkel', 'email'=>'bengkel9@gmail.com',  'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567899', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_tengah_lima', 'skor'=>1, 'role'=>'bengkel', 'email'=>'bengkel10@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567900', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],


            // kecamatan barat
            ['username'=>'bengkel_resmi_barat_satu', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel11@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567901', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_barat_dua', 'skor'=>1,   'role'=>'bengkel', 'email'=>'bengkel12@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567902', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_barat_tiga','skor'=>1,   'role'=>'bengkel', 'email'=>'bengkel13@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567903', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_barat_empat','skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel14@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567904', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_barat_lima', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel15@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567905', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],


            // kecamatan selatan
            ['username'=>'bengkel_resmi_selatan_satu','skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel16@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567906', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_selatan_dua', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel17@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567907', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_selatan_tiga','skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel18@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567908', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_selatan_empat','skor'=>1, 'role'=>'bengkel', 'email'=>'bengkel19@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567909', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_selatan_lima', 'skor'=>1, 'role'=>'bengkel', 'email'=>'bengkel20@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567910', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],


            // kecamatan timur
            ['username'=>'bengkel_resmi_timur_satu', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel21@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567911', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_timur_dua',  'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel22@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567912', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_timur_tiga','skor'=>1,   'role'=>'bengkel', 'email'=>'bengkel23@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567913', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_timur_empat','skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel24@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567914', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],
            ['username'=>'bengkel_resmi_timur_lima', 'skor'=>1,  'role'=>'bengkel', 'email'=>'bengkel25@gmail.com', 'password'=>Hash::make('bengkel123'), 'wa_number'=>'081234567915', 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()],


            // USER ACCOUNT
            ['username'=>'user_resmi', 'role'=>'user', 'skor'=>0, 'email'=>'user@gmail.com', 'password' => Hash::make('user123'), 'wa_number'=>'089876543210', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'Zahra Nabila', 'role'=>'user', 'skor'=>0, 'email'=>'zahranabila@gmail.com', 'password' => Hash::make('user123'), 'wa_number'=>'089876543210', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],

        ]);
    }
}
