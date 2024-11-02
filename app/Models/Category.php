<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Khai báo các thuộc tính có thể được điền vào khi sử dụng mass assignment
    protected $fillable = ['name'];

    // Nếu bảng trong database có tên khác với tên mặc định, bỏ chú thích dòng sau và khai báo tên bảng đúng
    // protected $table = 'your_table_name';

    /**
     * Quan hệ với model Product
     * Một danh mục có thể có nhiều sản phẩm
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
