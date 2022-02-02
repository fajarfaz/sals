<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\AdditionalSettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShowProductsController;
use App\Http\Controllers\CategoryController;
use App\Models\Product;
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



Route::get('/', [DashboardController::class, 'index'])->name('welcome');
Route::get('product_detail', [DashboardController::class, 'show'])->name('product_detail');
Route::get('/product_detail/{slug}', [DashboardController::class,'show']);
Route::get('productshow', [ShowProductsController::class,'index'])->name('productshow');
Route::get('productshow?sort={sort}', [ShowProductsController::class,'index'])->name('productshow?sort={sort}');
Route::get('productshow?category={slug}', [ShowProductsController::class,'index'])->name('productshow?category={slug}');
// Route::get('/', [ProductController::class,'show'])->name('welcome');

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('admin/category/checkSlug', [CategoryController::class, 'checkSlug']);

// Route::get('/detail-room/{slug}', [RoomController::class,'show']);
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['login_check:admin']], function () {
        Route::resource('admin', AdminController::class);
        Route::resource('products', ProductController::class);
        Route::resource('testimonials', TestimonialsController::class);
        Route::resource('additional_settings', AdditionalSettingsController::class);
        Route::resource('category', CategoryController::class);
    });
    Route::group(['middleware' => ['login_check:editor']], function () {
        Route::resource('editor', AdminController::class);
    });
});