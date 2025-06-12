<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CartController;

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

Route::resource('products', ProductController::class);
Route::resource('product-types', ProductTypeController::class);
