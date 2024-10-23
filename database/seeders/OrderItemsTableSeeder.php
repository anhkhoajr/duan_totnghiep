<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('order_items')->insert([
            ['id' => 1, 'booking_id' => 1, 'product_id' => 1, 'quantity' => 2, 'price' => 10.50],
            ['id' => 2, 'booking_id' => 1, 'product_id' => 2, 'quantity' => 4, 'price' => 1.50],
        ]);
    }
}
