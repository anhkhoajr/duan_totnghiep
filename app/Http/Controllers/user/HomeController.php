<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    protected $model;
    protected $product;

    public function __construct(Product $model){
        $this->model = $model;
    }

    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->take(5)->get();
        return view('users.home', compact('product')); // Trả về view 'home', view này sẽ sử dụng layout
    }

}
