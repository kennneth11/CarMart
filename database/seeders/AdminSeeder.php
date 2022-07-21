<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'ADMIN',
            'last_name' => 'ADMIN',
            'email' => 'ADMINCARMART@carmart.buk.com',
            'username' => 'ADMIN@CARMART',
            'mobile_num' => '09531548869',
            'password' => bcrypt('admin@carmart2022'),
            'city' => 'CITY OF VALENCIA',
            'barangay' => 'Poblacion',
            'purok' => 'CENTRO',
            'email_verified_at' => '2022-07-20 18:20:55',
        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
            'user_type' => 'App\Models\User',
        ]);
    }
}
