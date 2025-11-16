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
            ['username'=>'admin', 'role'=>'admin' ,'email'=>'admin@sibantar.com', 'password' => Hash::make('admin123'), 'wa_number'=>'081234567890', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'randyfebrian', 'role'=>'admin' ,'email'=>'2310817110013@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'muhammadrizky', 'role'=>'admin' ,'email'=>'2310817310011@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'zahranabila', 'role'=>'admin' ,'email'=>'2310817110011@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'ghanimudzakir', 'role'=>'admin' ,'email'=>'2310817320007@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'erikamaulidiya', 'role'=>'admin' ,'email'=>'dosentester', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],

            // BENGKEL ACCOUNT
            ['username'=>'bengkel_resmi', 'role'=>'bengkel', 'email'=>'bengkel@gmail.com', 'password' => Hash::make('bengkel123'), 'wa_number'=>'081234567890', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],

            // USER ACCOUNT
            ['username'=>'user_resmi', 'role'=>'user', 'email'=>'user@gmail.com', 'password' => Hash::make('user123'), 'wa_number'=>'089876543210', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],

        ]);
    }
}
