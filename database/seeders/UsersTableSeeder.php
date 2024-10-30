<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'khoa',
                'email' => 'danganhkhoa20@gmail.com',
                'password' => Hash::make('password123'),
                'phone' => '123456789',
                'role' => 'user'
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'phone' => '987654321',
                'role' => 'admin'
            ]
        ]);
    }
}
