<?php
//user
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductsController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\TableController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\OrderItemController;
use App\Http\Controllers\User\PaymentController;
//admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminTablesController;
use App\Http\Controllers\Admin\AdminBookingsController;
use App\Http\Controllers\Admin\AdminOrdersController;

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
Route::group([], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/menus', [ProductsController::class, 'showMenu'])->name('users.menus');
    Route::get('/chitiet', [ProductsController::class, 'chitiet'])->name('users.chitiet');
    Route::get('/table', [TableController::class, 'table'])->name('users.table');

    Route::get('/dat-ban', [BookingController::class, 'create'])->name('datBan.create');
    Route::post('/dat-ban', [BookingController::class, 'store'])->name('datBan.store');

    Route::get('/dat-mon/{booking}', [OrderItemController::class, 'create'])->name('datMon.create');
    Route::post('/dat-mon/{booking}', [OrderItemController::class, 'store'])->name('datMon.store');

    Route::get('payment/{bookingId}', [PaymentController::class, 'show'])->name('payment.page');
    Route::post('payment/{bookingId}/confirm', [PaymentController::class, 'confirm'])->name('payment.confirm');

    Route::get('/blog', [BlogController::class, 'blog'])->name('users.blog');
    Route::get('/contact', [ContactController::class, 'contact'])->name('users.contact');
});



// đăng ký
Route::get('register', [UserController::class, 'showRegisterForm'])->name('admin.register');
Route::post('register', [UserController::class, 'register'])->name('admin.register.submit');
// Route cho trang login admin (không sử dụng middleware 'auth' vì người dùng chưa đăng nhập)
Route::get('/login', [UserController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [UserController::class, 'login'])->name('admin.login.submit');

// Route cho đăng xuất (đặt trong nhóm có middleware 'auth')
Route::post('/logout', [UserController::class, 'logout'])->name('admin.logout');

// Các route của trang admin (được bảo vệ bởi middleware 'auth')

// Routes cho admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin.check'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categorys');
    //products
    Route::get('/products', [AdminProductsController::class, 'products'])->name('admin.productlist'); // Danh sách sản phẩm
    Route::get('/products/create', [AdminProductsController::class, 'create'])->name('admin.addproduct'); // Thêm sản phẩm
    Route::post('/products', [AdminProductsController::class, 'store'])->name('admin.storeproduct'); // Xử lý thêm sản phẩm
    Route::get('/products/{id}/edit', [AdminProductsController::class, 'edit'])->name('admin.edit'); // Sửa sản phẩm
    Route::put('/products/{id}', [AdminProductsController::class, 'update'])->name('admin.update'); // Cập nhật sản phẩm
    Route::delete('/products/{id}', [AdminProductsController::class, 'destroy'])->name('admin.destroy'); // Xóa sản phẩm
    //end

    //Categories
    Route::get('/categories', [AdminCategoriesController::class, 'index'])->name('admin.categorys'); // Danh sách danh mục
    Route::get('/categories/create', [AdminCategoriesController::class, 'create'])->name('admin.addcategory'); // Thêm danh mục
    Route::post('/categories', [AdminCategoriesController::class, 'store'])->name('admin.storecategory'); // Xử lý thêm danh mục
    Route::get('/categories/{id}/edit', [AdminCategoriesController::class, 'edit'])->name('admin.editcategory'); // Sửa danh mục
    Route::put('/categories/{id}', [AdminCategoriesController::class, 'update'])->name('admin.updatecategory'); // Cập nhật danh mục
    Route::delete('/categories/{id}', [AdminCategoriesController::class, 'destroy'])->name('admin.destroycategory'); // Xóa danh mục
    //end
    // Routes cho người dùng
    Route::get('/users', [AdminUsersController::class, 'index'])->name('admin.users.index'); // Danh sách người dùng
    Route::get('/users/create', [AdminUsersController::class, 'create'])->name('admin.users.create'); // Thêm người dùng
    Route::post('/users', [AdminUsersController::class, 'store'])->name('admin.users.store'); // Xử lý thêm người dùng
    Route::get('/users/{id}/edit', [AdminUsersController::class, 'edit'])->name('admin.users.edit'); // Sửa người dùng
    Route::put('/users/{id}', [AdminUsersController::class, 'update'])->name('admin.users.update'); // Cập nhật người dùng
    Route::delete('/users/{id}', [AdminUsersController::class, 'destroy'])->name('admin.users.destroy'); // Xóa người dùng

    // Routes cho đặt bàn
    Route::get('/tables', [AdminTablesController::class, 'index'])->name('admin.tables.index');          // Danh sách bàn
    Route::get('/tables/create', [AdminTablesController::class, 'create'])->name('admin.tables.create');  // Thêm bàn mới
    Route::post('/tables', [AdminTablesController::class, 'store'])->name('admin.tables.store');          // Xử lý thêm bàn
    Route::get('/tables/{id}/edit', [AdminTablesController::class, 'edit'])->name('admin.tables.edit');   // Sửa thông tin bàn
    Route::put('/tables/{id}', [AdminTablesController::class, 'update'])->name('admin.tables.update');    // Cập nhật thông tin bàn
    Route::delete('/tables/{id}', [AdminTablesController::class, 'destroy'])->name('admin.tables.destroy'); // Xóa bàn
    // Trong web.php
    Route::get('/table/{id}/details', [AdminTablesController::class, 'showDetails'])->name('table.details');

    // Route lưu đơn hàng
    Route::get('orders/create', [AdminOrdersController::class, 'create'])->name('orders.create');
    Route::post('/bookings/{booking}/order', [AdminOrdersController::class, 'store'])->name('bookings.order.store');
    Route::post('/orders', [AdminOrdersController::class, 'store'])->name('orders.store');

    // end
});



// Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
