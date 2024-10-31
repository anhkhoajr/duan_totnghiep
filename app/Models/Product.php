<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Các thuộc tính có thể được gán hàng loạt
    protected $fillable = [
        'users_id',       // ID của người dùng (FK)
        'categories_id',  // ID của danh mục (FK)
        'name',           // Tên sản phẩm
        'img',            // Hình ảnh sản phẩm
        'description',    // Mô tả sản phẩm
        'sale_price',     // Giá khuyến mãi
        'price',          // Giá gốc
    ];

    // Định nghĩa mối quan hệ với User (nếu cần)
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Định nghĩa mối quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}


