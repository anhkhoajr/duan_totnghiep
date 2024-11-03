<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'product_id',  // Đổi từ products_id thành product_id
        'quantity',
        'price',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}

