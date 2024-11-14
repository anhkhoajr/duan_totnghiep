<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_id',
        'name',
        'phone',
        'message',
        'booking_date',
        'booking_time',
        'number_of_guests',
        'payment_method',
        'payment_date',
        'booking_status',
        'order_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
}

