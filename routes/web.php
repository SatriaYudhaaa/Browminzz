<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    $products = Product::take(5)->get();
    return view('home', compact('products'));
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products', [UserProductController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::resource('/admin/testimoni', TestimoniController::class);
Route::post('/admin/products/{id}/favorite', [ProductController::class, 'toggleFavorite']);
Route::get('/products/{id}', [App\Http\Controllers\UserProductController::class, 'show']);
Route::get('/admin/favorites', [ProductController::class, 'favorites']);
Route::post('/admin/favorites/{id}', [ProductController::class, 'toggleFavorite']);
Route::get('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'index']);  
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/checkout', [CartController::class, 'processCheckout']);
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease']);


