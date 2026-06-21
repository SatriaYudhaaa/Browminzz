<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| USER (FRONTEND)
|--------------------------------------------------------------------------
*/
Route::get('/products', [UserProductController::class, 'index']);
Route::get('/products/{id}', [UserProductController::class, 'show']);


/*
|--------------------------------------------------------------------------
| CART (🔥 FIX UTAMA DI SINI)
|--------------------------------------------------------------------------
*/
Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease']);
Route::get('/cart/data', [CartController::class, 'getCart']);

Route::get('/cart', [CartController::class, 'index']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::post('/checkout', [CartController::class, 'processCheckout']);
Route::get('/cart/add/{id}', [CartController::class, 'add']);
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease']);;
/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    });

    Route::resource('products', ProductController::class);

    Route::post('/products/{id}/favorite', [ProductController::class, 'toggleFavorite']);

    Route::get('/favorites', [ProductController::class, 'favorites']);
    Route::post('/favorites/{id}', [ProductController::class, 'toggleFavorite']);

    Route::resource('testimoni', TestimoniController::class);
});