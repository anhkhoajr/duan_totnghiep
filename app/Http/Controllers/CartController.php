<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('users.cart'); // Trả về view 'home', view này sẽ sử dụng layout
    }
}
