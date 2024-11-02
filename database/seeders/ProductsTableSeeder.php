<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Dữ liệu mẫu
        $products = [
            [
                'name' => 'Gỏi bông điên điển tép đồng',
                'img' => 'Goi-bong-dien-dien-tep-dong.jpg',
                'description' => 'Delicious spaghetti with tomato sauce',
                'sale_price' => 229000, // Đã bỏ dấu phân cách
                'price' => 219000, // Đã bỏ dấu phân cách
            ],
            [
                'name' => 'Hủ tiếu sa tế',
                'img' => 'Hu-tieu-sa-tế-thumbnail.jpg',
                'description' => 'Refreshing soft drink',
                'sale_price' => 85000, // Đã bỏ dấu phân cách
                'price' => 75000, // Đã bỏ dấu phân cách
            ],
            [
                'name' => 'Chả giò tôm thịt',
                'img' => 'Cha-gio-tom-thit.jpg',
                'description' => 'Creamy cheesecake with strawberries',
                'sale_price' => 189000, // Đã bỏ dấu phân cách
                'price' => 179000, // Đã bỏ dấu phân cách
            ],
            // Thêm các sản phẩm khác ở đây
        ];

        // Tạo sản phẩm từ mảng
        foreach ($products as $product) {
            DB::table('products')->insert([
                'users_id' => 2, // ID của người dùng (users)
                'categories_id' => rand(1, 3), // Giả định bạn có 3 danh mục
                'name' => $product['name'],
                'img' => $product['img'],
                'description' => $product['description'],
                'sale_price' => $product['sale_price'], 
                'price' => $product['price'], 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
