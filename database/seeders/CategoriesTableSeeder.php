<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Điểm Tâm Sáng'],
            ['id' => 2, 'name' => 'Món Bò'],
            ['id' => 3, 'name' => 'Khai vị']
        ]);
    }
}
