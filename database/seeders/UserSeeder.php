<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'username' => 'adminUser',
                'email' => 'nino@gmail.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('86108154'),
            ],
            [
                'name' => 'Vendor User',
                'username' => 'vendorUser',
                'email' => 'vendedor@gmail.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('86108154'),
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('86108154'),
            ]
        ]);
    }
}