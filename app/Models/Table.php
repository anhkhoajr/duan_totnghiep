<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'capacity', 'status'];

    /**
     * Quan hệ với model Booking
     * Một bàn có thể có nhiều booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    /**
     * Quan hệ với model OrderItem (nếu cần)
     * Một bàn có thể có nhiều order items
     */
    public function isReserved()
    {
        // Kiểm tra xem có bất kỳ booking nào cho bàn này hay không
        return $this->bookings()->exists();
    }
}
