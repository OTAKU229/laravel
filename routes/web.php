<?php

use Illuminate\Support\Facades\Route;




use App\Http\Controllers\CartController;

Route::get('/', [CartController::class, 'index'])->name('products.index');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/products', [CartController::class, 'backToProducts'])->name('products.back');
