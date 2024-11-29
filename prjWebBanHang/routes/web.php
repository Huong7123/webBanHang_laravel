<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogSingleController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
//page-home
Route::get('/', [HomeController::class, 'index']);
Route::get('trang-chu', [HomeController::class, 'index']);
Route::post('tim-kiem', [HomeController::class, 'search']);
Route::get('san-pham', [HomeController::class,'list_product']);
Route::get('login', [HomeController::class, 'login'])->name('login');
Route::post('login-home', [HomeController::class, 'login_home']);
Route::get('logout-home', [HomeController::class, 'logout_home']);



//danh mục sản phẩm trang chủ
Route::get('danh-muc-san-pham/{category_id}', [CategoryProduct::class,'show_category_home']);
Route::get('thuong-hieu-san-pham/{brand_id}', [BrandProduct::class,'show_brand_home']);
Route::get('chi-tiet-san-pham/{product_id}', [ProductController::class,'details_product']);


//cart
Route::post('add-cart', [CartController::class, 'add_cart']);
Route::post('update-cart', [CartController::class, 'update_cart']);
Route::get('show-cart', [CartController::class, 'show_cart']);
Route::get('gio-hang', [CartController::class, 'gio_hang'])->name('cart');
Route::get('del-all-product', [CartController::class, 'delete_all_product']);
Route::get('/del-product/{session_id}', [CartController::class, 'delete_product']);

//checkout
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('add-customer', [CheckoutController::class, 'add_customer']);
Route::post('login-customer', [CheckoutController::class, 'login_customer']);
Route::post('order-place', [CheckoutController::class, 'order_place']);

//order
Route::get('manage-order', [CheckoutController::class, 'manage_order']);
Route::get('view-order/{order_id}', [CheckoutController::class, 'view_order']);

//page-admin
Route::get('admin', [AdminController::class, 'index']);
Route::get('dashboard', [AdminController::class, 'showDashboard']);
Route::get('logout', [AdminController::class, 'logout']);
Route::post('admin-dashboard', [AdminController::class, 'dashboard']);


//category-product
Route::get('add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('all-category-product', [CategoryProduct::class, 'all_category_product']);
Route::get('edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

//brand-product
Route::get('add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('all-brand-product', [BrandProduct::class, 'all_brand_product']);
Route::get('edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
Route::get('active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);

//Product
Route::get('/add-product',[ProductController::class,'add_product']);
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product']);
Route::get('/all-product',[ProductController::class,'all_product']);
Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product']);
Route::get('/active-product/{product_id}',[ProductController::class,'active_product']);

