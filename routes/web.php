<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerAuth\CustomerLoginController;


/* 
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});

Route::get('single-product.html', function () {
    return view('single_product');
});

Route::get('products.html', function () {
    return view('products');
});


Route::middleware(['auth:customer'])->group(function () {

    Route::get('login_signup',[CustomerController::class,'login_signup'])->name('login_signup');

    Route::get('customer_login',[CustomerLoginController::class,'showLoginForm'])->name('customer_login');
    Route::post('/customer_login',[CustomerLoginController::class,'login']);
    Route::get('customer_logout',[CustomerController::class,'customer_logout'])->name('customer_logout');
    
    Route::get('customer_signup',[CustomerController::class,'signup'])->name('customer_signup');
    Route::post('store_customer',[CustomerController::class,'store_customer'])->name('store_customer');
    
});







Auth::routes();
Route::post('/logout' , [DashboardController::class,'logout'])->name('logout');



//routes that are accessable only by admin & super_admin 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/sales' , [DashboardController::class,'sales'])->name('sales');
Route::get('/order_list' , [DashboardController::class,'orders'])->name('orders');
Route::get('/product_list' , [DashboardController::class,'product_list'])->name('product_list');
Route::delete('/product_list/{id}' , [DashboardController::class,'destroy_product']);
Route::post('/add_product' , [DashboardController::class,'store_product'])->name('store_product');
Route::get('/edit_product_details/{product}' , [DashboardController::class,'edit_product_details'])->name('edit_product_details');
Route::put('/update_product/{id}' , [DashboardController::class,'update_product'])->name('update_product');
Route::get('/customer_list' , [DashboardController::class,'customers'])->name('customers');
Route::get('/add_product' , [DashboardController::class,'add_product'])->name('add_product');



//routes that are accessable only by super_admin 
Route::get('/private' , [DashboardController::class,'private']);
Route::get('/admin_list' , [DashboardController::class,'admin_list'])->name('admin_list');
Route::delete('/admin_list/{id}' , [DashboardController::class,'destroy']);
Route::get('/add_admin' , [DashboardController::class,'add_admin'])->name('add_admin');
Route::post('/add_admin' , [DashboardController::class,'store_admin'])->name('store_admin');
Route::get('/edit_admin_details/{user}' , [DashboardController::class,'edit_admin_details'])->name('edit_admin_details');
Route::put('/update_admin/{id}' , [DashboardController::class,'update_admin'])->name('update_admin');





