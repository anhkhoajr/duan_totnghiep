<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tables')->insert([
            ['id' => 1, 'type' => 'round', 'capacity' => 4, 'status' => 'available'],
            ['id' => 2, 'type' => 'square', 'capacity' => 6, 'status' => 'occupied'],
            ['id' => 3, 'type' => 'rectangle', 'capacity' => 8, 'status' => 'available']
        ]);
    }
}
