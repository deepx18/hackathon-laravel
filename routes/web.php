<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminOrderController;

Route::get ('/',         [MainController::class, 'index'])->name('main.index');
Route::get ('/products', [ProductController::class, 'index'])->name('products');
Route::get ('/login',    [LoginController::class,    'showForm'])->name('login');
Route::post('/login',    [LoginController::class,    'login']);
Route::get ('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout',   [LoginController::class,    'logout'])->name('logout');


Route::middleware(['auth', 'role:client'])->group(function () {
    Route::get   ('/cart',           [CartController::class,  'index'])->name('cart.index');
    Route::post  ('/cart/add',       [CartController::class,  'add'])->name('cart.add');
    Route::patch ('/cart/{item}',    [CartController::class,  'update'])->name('cart.update');
    Route::delete('/cart/{item}',    [CartController::class,  'remove'])->name('cart.remove');
    Route::post  ('/checkout',       [OrderController::class, 'checkout'])->name('order.checkout');
    Route::get   ('/orders',         [OrderController::class, 'history'])->name('order.history');
    Route::get   ('/orders/{order}', [OrderController::class, 'show'])->name('order.show');
});


Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get  ('/orders',           [AdminOrderController::class, 'index'])->name('orders.index');
        Route::patch('/orders/{order}',   [AdminOrderController::class, 'updateStatus'])->name('orders.update');
    });
