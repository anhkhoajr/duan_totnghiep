<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// routes/web.php
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/menus', [App\Http\Controllers\ProductsController::class, 'showMenu'])->name('products.menus');
Route::get('/chitiet', [App\Http\Controllers\ProductsController::class, 'chitiet'])->name('products.chitiet');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.giohang');


//admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
});
