<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'bank',
        'accountNo',
        'amount',
        'menuCode',
        'transaction_id',
        'payment_method',
        'status',
        'error_message',
        'payment_date',
        'is_verified'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'payment_products', 'payment_id', 'product_id');
    }
}
