<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('blogs')->insert([
            ['id' => 1, 'users_id' => 2, 'title' => 'New Dishes Added!', 'content' => 'Check out our new dishes for the fall season.', 'img' => 'new_dishes.jpg'],
            ['id' => 2, 'users_id' => 2, 'title' => 'Our Anniversary Celebration', 'content' => 'Join us for our 5th anniversary celebration!', 'img' => 'anniversary.jpg']
        ]);
    }
}
