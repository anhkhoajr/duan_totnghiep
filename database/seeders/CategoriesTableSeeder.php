<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Main Dish'],
            ['id' => 2, 'name' => 'Drinks'],
            ['id' => 3, 'name' => 'Desserts']
        ]);
    }
}
