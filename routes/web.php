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




//routes that are accessable only by admin user
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/private' , [DashboardController::class,'private']);







// Route::middleware(['auth'])->group(function () {
//     //Routes that require authentication
//     Route::get('/dashboard', [DashboardController::class, 'index']);
// });