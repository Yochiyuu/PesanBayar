<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 1. RUTE UNTUK PELANGGAN (Tidak perlu login / Guest)
Route::get('/resto/{slug}', [RestaurantController::class, 'show'])->name('restaurant.show');
Route::post('/resto/{restaurant_id}/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// 2. RUTE UNTUK PEMILIK RESTORAN (Wajib Login)
Route::middleware('auth')->group(function () {
    
    // Rute Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen Restoran
    Route::get('/daftar-resto', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('/daftar-resto', [RestaurantController::class, 'store'])->name('restaurant.store');
    
    // Manajemen Menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
});

require __DIR__.'/auth.php';