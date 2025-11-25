<?php

namespace Database\Seeders;

use App\Models\CalonBengkelModel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            BengkelSeeder::class,
            ServiceSeeder::class,
            BookingSeeder::class,
            FinalPriceSeeder::class,
            ReviewSeeder::class,

            UserRoleSeeder::class,
            UserRoleMapSeeder::class,

            CalonBengkelSeeder::class,
            LayananBengkelSeeder::class,
            BengkelStatusSeeder::class,
            StatusRealTimeBengkelSeeder::class
        ]);
    }
}
