<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\Storage;

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
        $restaurant = Restaurant::query()->where('slug', $slug)->with('menus')->firstOrFail();
        
        return View::make('restaurant.show', compact('restaurant'));
    }

    // Tambahkan import Storage di bagian paling atas file jika belum ada:
    // use Illuminate\Support\Facades\Storage;

    public function edit(Request $request)
    {
        $restaurant = $request->user()->restaurant;

        if (!$restaurant) {
            return redirect()->route('restaurant.create')->with('info', 'Silakan buat restoran Anda terlebih dahulu.');
        }

        return view('restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request)
    {
        $restaurant = $request->user()->restaurant;

        if (!$restaurant) {
            return back()->with('error', 'Restoran tidak ditemukan.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:3072', // Maksimal 3MB
            'is_open' => 'required|boolean',
        ]);

        $bannerPath = $restaurant->banner;

        if ($request->hasFile('banner')) {
            // Hapus banner lama jika ada untuk menghemat kapasitas disk
            if ($restaurant->banner && Storage::disk('public')->exists($restaurant->banner)) {
                Storage::disk('public')->delete($restaurant->banner);
            }
            $bannerPath = $request->file('banner')->store('banners', 'public');
        }

        $restaurant->update([
            'name' => $request->name,
            'description' => $request->description,
            'banner' => $bannerPath,
            'is_open' => $request->is_open,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pengaturan restoran berhasil diperbarui!');
    }
}