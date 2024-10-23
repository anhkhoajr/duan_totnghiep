<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Trả về view 'admin.home' dùng layout của admin
        return view('admin.home');
    }
}

