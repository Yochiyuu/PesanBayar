<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// RUTE KHUSUS PEMILIK RESTORAN (Wajib Login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manajemen Restoran
    Route::get('/daftar-resto', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('/daftar-resto', [RestaurantController::class, 'store'])->name('restaurant.store');
    
    // RUTE PENGATURAN (URL diubah menjadi /pengaturan-resto agar tidak bentrok dengan {slug})
    Route::get('/pengaturan-resto', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::put('/pengaturan-resto', [RestaurantController::class, 'update'])->name('restaurant.update');

    // Manajemen Menu
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{menu}/update', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menu}/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');
});

// RUTE PUBLIK PELANGGAN (Tanpa Login)
// Halaman Etalase / Katalog Restoran
Route::get('/resto/{slug}', [RestaurantController::class, 'show'])->name('restaurant.show');

// Sistem Keranjang (Cart)
Route::post('/cart/add/{menu_id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{menu_id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Checkout & Struk Pesanan
Route::post('/order/{restaurant_id}', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

require __DIR__.'/auth.php';