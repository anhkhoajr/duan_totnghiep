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

    public function categories()
    {
        // Logic cho trang danh mục
        return view('admin.categories');
    }
    public function users()
    {
        // Logic cho trang người dùng
        return view('admin.users');
    }
}
