<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Các trường có thể được điền

    public function products()
    {
        return $this->hasMany(Product::class); // Một danh mục có nhiều sản phẩm
    }
}
