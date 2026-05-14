<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $restaurant = $request->user()->restaurant;

        if (!$restaurant) {
            return back()->with('error', 'Buat restoran terlebih dahulu.');
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menus', 'public');
        }

        Menu::create([
            'restaurant_id' => $restaurant->id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'is_available' => true,
        ]);

        return back()->with('success', 'Menu berhasil ditambahkan!');
    }

    public function index(Request $request)
    {
        // Ambil data resto punya user yang lagi login
        $restaurant = $request->user()->restaurant;

        // Kalau dia belum bikin resto, lempar ke halaman daftar resto
        if (!$restaurant) {
            return redirect()->route('restaurant.create')->with('info', 'Silakan buat restoran Anda terlebih dahulu sebelum mengelola menu.');
        }

        // Ambil semua menu milik resto tersebut
        $menus = $restaurant->menus;

        // Tampilkan ke halaman view menu.index
        return view('menu.index', compact('menus', 'restaurant'));
    }
}