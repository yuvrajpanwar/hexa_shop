<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\CustomerAuth\CustomerLoginController;
use App\Http\Controllers\CustomerAuth\CustomerRegisterController;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('category/{category}', [FrontController::class, 'category'])->name('category');
Route::get('product/{product_id}', [FrontController::class, 'product'])->name('product');
Route::post('add_to_cart', [FrontController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('cart', [FrontController::class, 'cart'])->name('cart');
Route::post('remove_cart_product', [FrontController::class, 'remove_cart_product'])->name('remove_cart_product');
Route::post('update_quantity', [FrontController::class, 'update_quantity'])->name('update_quantity');

Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
Route::post('add_to_wishlist', [WishlistController::class, 'add_to_wishlist'])->name('add_to_wishlist');
Route::post('remove_wishlist_product', [WishlistController::class, 'remove_wishlist_product'])->name('remove_wishlist_product');


// customer authentication routes
Route::post('customer_login',[CustomerLoginController::class,'login'])->name('customer_login');
Route::post('customer_logout',[CustomerLoginController::class,'logout'])->name('customer_logout');
Route::get('customer_register',[CustomerRegisterController::class, 'showRegistrationForm'])->name('customer_register');
Route::post('customer_register',[CustomerRegisterController::class,'register'])->name('customer_register');
Route::get('profile',[CustomerController::class, 'profile'])->name('profile');
Route::post('update_details',[CustomerController::class, 'update_details'])->name('update_details');

// checkout routes
Route::get('checkout',[FrontController::class, 'checkout'])->name('checkout');
Route::post('place_order',[FrontController::class, 'place_order'])->name('place_order');


//my order routes
Route::get('my_orders',[MyOrdersController::class, 'my_orders'])->name('my_orders');
Route::get('make_payment',[MyOrdersController::class, 'make_payment'])->name('make_payment');
Route::get('create_order_id',[RazorpayPaymentController::class, 'create_order_id'])->name('create_order_id');
Route::post('update_payment_status',[MyOrdersController::class, 'update_payment_status'])->name('update_payment_status');
Route::get('order_placed',[MyOrdersController::class, 'order_placed'])->name('order_placed');
Route::post('pay_now',[MyOrdersController::class, 'pay_now'])->name('pay_now');
Route::get('payment_successful',[MyOrdersController::class, 'payment_successful'])->name('payment_successful');











Auth::routes();
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('admin');
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

//routes that are accessable only by admin & super_admin 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/sales', [SalesController::class, 'sales'])->name('sales');
Route::get('/order_list', [OrdersController::class, 'orders'])->name('orders');
Route::get('/product_list', [DashboardController::class, 'product_list'])->name('product_list');
Route::delete('/product_list/{id}', [DashboardController::class, 'destroy_product']);
Route::post('/add_product', [DashboardController::class, 'store_product'])->name('store_product');
Route::get('/edit_product_details/{product}', [DashboardController::class, 'edit_product_details'])->name('edit_product_details');
Route::put('/update_product/{id}', [DashboardController::class, 'update_product'])->name('update_product');
Route::get('/customer_list', [DashboardController::class, 'customers'])->name('customers');
Route::get('/add_product', [DashboardController::class, 'add_product'])->name('add_product');
//end routes that are accessable only by admin & super_admin 

//routes that are accessable only by super_admin 
Route::get('/admin_list', [DashboardController::class, 'admin_list'])->name('admin_list');
Route::delete('/admin_list/{id}', [DashboardController::class, 'destroy']);
Route::get('/add_admin', [DashboardController::class, 'add_admin'])->name('add_admin');
Route::post('/add_admin', [DashboardController::class, 'store_admin'])->name('store_admin');
Route::get('/edit_admin_details/{user}', [DashboardController::class, 'edit_admin_details'])->name('edit_admin_details');
Route::put('/update_admin/{id}', [DashboardController::class, 'update_admin'])->name('update_admin');
//end routes that are accessable only by super_admin 

Route::get('/permissions', [RoleController::class, 'permissions'])->name('permissions');
Route::get('/add_permission', [RoleController::class, 'add_permission'])->name('add_permission');
Route::delete('/destroy_permission/{id}', [RoleController::class, 'destroy_permission']);
Route::post('/store_permission', [RoleController::class, 'store_permission'])->name('store_permission');
Route::get('/roles', [RoleController::class, 'roles'])->name('roles');
Route::get('/add_role', [RoleController::class, 'add_role'])->name('add_role');
Route::post('/store_role', [RoleController::class, 'store_role'])->name('store_role');
Route::delete('/destroy_role/{id}', [RoleController::class, 'destroy_role']);

Route::get('/assign_permissions', [RoleController::class, 'assign_permissions'])->name('assign_permissions');
Route::post('/store_assign_permissions', [RoleController::class, 'store_assign_permissions'])->name('store_assign_permissions');
Route::get('/get-permissions/{role}', [RoleController::class, 'getPermissions'])->name('get_permissions');
Route::get('/images/{product}', [ImageController::class, 'images'])->name('images');
Route::get('/add_images/{product}', [ImageController::class, 'add_image'])->name('add_image');
Route::post('/upload_images/{product}', [ImageController::class, 'upload_images'])->name('upload_images');
Route::delete('images/{image}', [ImageController::class, 'destroy_image']);
Route::post('/change_image_status', [ImageController::class, 'change_image_status'])->name('change_image_status');

Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');
Route::get('/add_category', [CategoryController::class, 'add_category'])->name('add_category');
Route::post('/store_category', [CategoryController::class, 'store_category'])->name('store_category');
Route::delete('/destroy_category/{id}', [CategoryController::class, 'destroy_category']);
Route::get('/edit_category/{category}', [CategoryController::class, 'edit_category'])->name('edit_category');
Route::post('/update_category/{category}', [CategoryController::class, 'update_category'])->name('update_category');

Route::get('/backgrounds', [BackgroundController::class, 'backgrounds'])->name('backgrounds');
Route::get('/add_background', [BackgroundController::class, 'add_background'])->name('add_background');
Route::post('/store_background', [BackgroundController::class, 'store_background'])->name('store_background');
Route::delete('/destroy_background/{id}', [BackgroundController::class, 'destroy_background']);


Route::post('allOrders',[OrdersController::class,'allOrders'])->name('allOrders');
Route::post('update_order_status',[OrdersController::class,'update_order_status'])->name('update_order_status');
