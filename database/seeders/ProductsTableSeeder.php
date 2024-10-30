<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'users_id' => 2, // ID của người dùng (users)
                'categories_id' => 1, // ID của danh mục (categories)
                'name' => 'Spaghetti',
                'img' => 'spaghetti.jpg',
                'description' => 'Delicious spaghetti with tomato sauce',
                'sale_price' => 10.50,
                'price' => 12.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'users_id' => 2,
                'categories_id' => 2,
                'name' => 'Coke',
                'img' => 'coke.jpg',
                'description' => 'Refreshing soft drink',
                'sale_price' => 1.50,
                'price' => 2.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'users_id' => 2,
                'categories_id' => 3,
                'name' => 'Cheesecake',
                'img' => 'cheesecake.jpg',
                'description' => 'Creamy cheesecake with strawberries',
                'sale_price' => 4.50,
                'price' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
