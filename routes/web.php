<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
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
Route::get('/add_product' , [DashboardController::class,'add_product'])->name('add_product');
Route::post('/add_product' , [DashboardController::class,'store_product'])->name('store_product');


//routes that are accessable only by super_admin 
Route::get('/private' , [DashboardController::class,'private']);
Route::get('/admin_list' , [DashboardController::class,'admin_list'])->name('admin_list');
Route::delete('/admin_list/{id}' , [DashboardController::class,'destroy']);
Route::get('/add_admin' , [DashboardController::class,'add_admin'])->name('add_admin');
Route::post('/add_admin' , [DashboardController::class,'store_admin'])->name('store_admin');

Route::get('/edit_admin_details/{user}' , [DashboardController::class,'edit_admin_details'])->name('edit_admin_details');
Route::put('/update_admin/{id}' , [DashboardController::class,'update_admin'])->name('update_admin');








// Route::middleware(['auth'])->group(function () {
//     //Routes that require authentication
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });