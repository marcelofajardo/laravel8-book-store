<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;

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


Route::name('pages.')->group( function() {
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/organizer', [PageController::class, 'organizer'])->name('organizer');
});


// Product
Route::group(['prefix' => '/products', 'as' => 'products.'], function () {
    Route::get('search', [ProductController::class, 'viewBySearch'])->name('search');
    Route::get('/', [ProductController::class, 'allProduct'])->name('all');
    Route::get('/{id}', [ProductController::class, 'viewProduct'])->name('detail');
    Route::get('/cat/{id}', [ProductController::class, 'viewByCategory'])->name('category');
});

// Cart
Route::group(['prefix' => '/cart', 'as' => 'carts.'], function () {
    Route::get('/', [CartController::class, 'show'])->name('all');
    Route::get('/addToCart/{id}', [CartController::class, 'addItem'])->name('add');
    Route::get('/updateCart/{id}', [CartController::class, 'decreaseItem'])->name('decrease');
    Route::get('/deleteItemFromCart/{id}', [CartController::class, 'removeItem'])->name('remove');
    Route::get('/clearCart', [CartController::class, 'clearCart'])->name('clear');

    // Checkout
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout.index');
});
