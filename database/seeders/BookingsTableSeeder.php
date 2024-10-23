<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('booking')->insert([
            [
                'id' => 1,
                'users_id' => 1,  // User ID phải khớp với bảng users
                'table_id' => 1,  // Table ID phải khớp với bảng table
                'booking_date' => '2024-10-20',
                'booking_time' => '19:00:00',
                'number_of_guests' => 4,
                'payment_method' => 'credit_card',
                'payment_code' => 'PAY123456',
                'booking_status' => 'confirmed',
                'order_status' => 'completed',  // Trạng thái của đơn hàng
                'note' => 'Celebration dinner'
            ],
            [
                'id' => 2,
                'users_id' => 2,
                'table_id' => 2,
                'booking_date' => '2024-11-05',
                'booking_time' => '20:00:00',
                'number_of_guests' => 6,
                'payment_method' => 'paypal',
                'payment_code' => 'PAY654321',
                'booking_status' => 'pending',
                'order_status' => 'pending',  // Trạng thái của đơn hàng
                'note' => 'Business meeting'
            ],
            [
                'id' => 3,
                'users_id' => 3,
                'table_id' => 3,
                'booking_date' => '2024-12-01',
                'booking_time' => '18:00:00',
                'number_of_guests' => 3,
                'payment_method' => 'cash',
                'payment_code' => 'PAY987654',
                'booking_status' => 'cancelled',
                'order_status' => 'cancelled',  // Trạng thái của đơn hàng
                'note' => 'Family dinner'
            ]
        ]);
    }
}
