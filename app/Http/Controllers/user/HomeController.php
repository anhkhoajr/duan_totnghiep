<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('users.home'); // Trả về view 'home', view này sẽ sử dụng layout
    }
}
