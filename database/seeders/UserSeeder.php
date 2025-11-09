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
            // para admin
            ['username'=>'randyfebrian', 'role'=>'admin' ,'email'=>'2310817110013@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(), ],
            ['username'=>'muhammadrizky', 'role'=>'admin' ,'email'=>'2310817310011@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'zahranabila', 'role'=>'admin' ,'email'=>'2310817110011@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
            ['username'=>'ghanimudzakir', 'role'=>'admin' ,'email'=>'2310817320007@mhs.ulm.ac.id', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],

            // ka erika
            ['username'=>'erikamaulidiya', 'role'=>'admin' ,'email'=>'erikamaulidiya@admin', 'password' => Hash::make('admin123'), 'wa_number'=>'0000', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),],
        ]);
    }
}
