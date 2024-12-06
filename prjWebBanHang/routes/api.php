<?php

use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Category product
Route::post('save-category-product', [CategoryProduct::class, 'save_category_product'])->name('api.save-category-product');
Route::post('update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product'])->name('api.update-category-product');

//Brand product
Route::post('save-brand-product', [BrandProduct::class, 'save_brand_product'])->name('api.save-brand-product');
Route::post('update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product'])->name('api.update-brand-product');

//Product
Route::post('/save-product',[ProductController::class,'save_product'])->name('api.save-product');
Route::post('/update-product/{product_id}',[ProductController::class,'update_product'])->name('api.update-product');
