<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $model;
    protected $product;

    public function __construct(Product $model){
        $this->model = $model;
    }

    public function index()
    {
        $products= Product::orderBy('created_at', 'desc')->take(5)->get();
            return Inertia::render('Home',["products"=>$products]);
      
    }

}
