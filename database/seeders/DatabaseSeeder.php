<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        // DB::table('users')->insert([
        //     'first_name' => 'Julius Kenn',
        //     'last_name' => 'Balendres',
        //     'username' => 'JuliusAdmin',
        //     'mobile_num' => '09051602183',
        //     'email' => 'admin@email.com',
        //     'password' => bcrypt('123456789'),
        //     'city' => 'Valencia City',
        //     'barangay' => 'Lumbo',
        //     'purok' => 'Purok - 2',
        //     'avatar' => '/userProfiles/profile.png',
        // ]);
        // DB::table('role_user')->insert([
        //     'role_id' => '1',
        //     'user_id' => '1',
        //     'user_type' => 'app/kajwd',
        // ]);
    }
}
