<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// library wajib seeder
use Illuminate\Support\Facades\DB;

class UserRoleMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_role_map')->insert([
            ['id_user'=>1, 'id_user_role'=>1],
            ['id_user'=>2, 'id_user_role'=>1],
            ['id_user'=>3, 'id_user_role'=>1],
            ['id_user'=>4, 'id_user_role'=>1],
            ['id_user'=>5, 'id_user_role'=>1],

            ['id_user'=>6, 'id_user_role'=>2],
            ['id_user'=>7, 'id_user_role'=>2],
            ['id_user'=>8, 'id_user_role'=>2],
            ['id_user'=>9, 'id_user_role'=>2],
            ['id_user'=>10, 'id_user_role'=>2],
        ]);
    }
}
