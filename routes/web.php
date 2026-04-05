<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/daftar-resto', [RestaurantController::class, 'create'])->name('restaurant.create');
Route::post('/daftar-resto', [RestaurantController::class, 'store'])->name('restaurant.store');

Route::get('/resto/{slug}', [RestaurantController::class, 'show'])->name('restaurant.show');

Route::post('/resto/{restaurant_id}/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');