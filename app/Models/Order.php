<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Danh sách các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'table_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Mối quan hệ với bảng `tables`
    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    // Mối quan hệ với bảng `products`
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Mối quan hệ với bảng `bookings` (nếu cần, giả sử một đơn hàng có thể liên quan đến một đặt chỗ)
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
