<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', [ProductController::class, 'index']);
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/checkout/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');

Route::resource('products', ProductController::class);
Route::resource('product-types', ProductTypeController::class);
