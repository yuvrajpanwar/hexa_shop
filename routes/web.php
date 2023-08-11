<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
    return view('landing');
});

Route::get('single-product.html', function () {
    return view('single_product');
});

Route::get('products.html', function () {
    return view('products');
});


Auth::routes();




//routes that are accessable only by admin & super_admin 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/sales' , [DashboardController::class,'sales'])->name('sales');
Route::get('/orders' , [DashboardController::class,'orders'])->name('orders');
Route::get('/products' , [DashboardController::class,'products'])->name('products');
Route::get('/customers' , [DashboardController::class,'customers'])->name('customers');


//routes that are accessable only by super_admin 
Route::get('/private' , [DashboardController::class,'private']);
Route::get('/admin_list' , [DashboardController::class,'admin_list'])->name('admin_list');
Route::get('/add_admin' , [DashboardController::class,'add_admin'])->name('add_admin');
Route::post('/add_admin' , [DashboardController::class,'store_admin'])->name('add_admin');








// Route::middleware(['auth'])->group(function () {
//     //Routes that require authentication
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });