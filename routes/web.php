<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/daftar-resto', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('/daftar-resto', [RestaurantController::class, 'store'])->name('restaurant.store');
    
    Route::resource('menu', MenuController::class);
});

Route::get('/resto/{slug}', [RestaurantController::class, 'show'])->name('restaurant.show');
Route::post('/resto/{restaurant_id}/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

require __DIR__.'/auth.php';