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
        
            // BENGKEL ACCOUNTS
            ['username'=>'bengkel', 'role'=>'bengkel' ,'email'=>'bengkel@sibantar.com', 'password' => Hash::make('bengkel123'), 'wa_number'=>'082345678901', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'bangjaya_bengkel', 'role'=>'bengkel' ,'email'=>'bangjaya_bengkel@mhs.ulm.ac.id', 'password' => Hash::make('bengkel123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'bangtera_bengkel', 'role'=>'bengkel' ,'email'=>'bangtera_bengkel@mhs.ulm.ac.id', 'password' => Hash::make('bengkel123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'bangmandiri_bengkel', 'role'=>'bengkel' ,'email'=>'bangmandiri_bengkel@mhs.ulm.ac.id', 'password' => Hash::make('bengkel123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'bangsama_bengkel', 'role'=>'bengkel' ,'email'=>'bangsama_bengkel@mhs.ulm.ac.id', 'password' => Hash::make('bengkel123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'bangprima_bengkel', 'role'=>'bengkel' ,'email'=>'bangprima_bengkel@mhs.ulm.ac.id', 'password' => Hash::make('bengkel123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],

            // USER ACCOUNTS
            ['username'=>'user', 'role'=>'user' ,'email'=>'user@sibantar.com', 'password' => Hash::make('user123'), 'wa_number'=>'083456789012', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'budi', 'role'=>'user' ,'email'=>'budi@gmail.com', 'password' => Hash::make('user123'), 'wa_number'=>'081111111111', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'siti', 'role'=>'user' ,'email'=>'siti@gmail.com', 'password' => Hash::make('user123'), 'wa_number'=>'082222222222', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'ahmad', 'role'=>'user' ,'email'=>'ahmad@gmail.com', 'password' => Hash::make('user123'), 'wa_number'=>'083333333333', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
        ]);
    }
}
