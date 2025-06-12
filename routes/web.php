<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', [ProductController::class, 'index']);

Route::resource('products', ProductController::class);
Route::resource('product-types', ProductTypeController::class);
