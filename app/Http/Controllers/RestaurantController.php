<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// PASTIKAN BARIS INI ADA AGAR View::make BISA DIGUNAKAN
use Illuminate\Support\Facades\View; 

class RestaurantController extends Controller
{
    public function create(Request $request)
    {
        if ($request->user()->restaurant) {
            return redirect()->route('dashboard')->with('info', 'Anda sudah memiliki restoran.');
        }
        return View::make('restaurant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Restaurant::create([
            'user_id' => $request->user()->id, 
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . uniqid(),
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard')->with('success', 'Restoran berhasil didaftarkan!');
    }
    
    public function show(string $slug) 
    {
        // PENTING: Tambahkan ->query() agar Intelephense mengerti
        $restaurant = Restaurant::query()->where('slug', $slug)->with('menus')->firstOrFail();
        
        return View::make('restaurant.show', compact('restaurant'));
    }
}