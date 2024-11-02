<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Logic cho trang chủ admin
        return view('admin.home');
    }

    public function orders()
    {
        // Logic cho trang đơn hàng
        return view('admin.orders');
    }
}
