<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk mengelola file gambar

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $restaurant = $request->user()->restaurant;

        if (!$restaurant) {
            return redirect()->route('restaurant.create')->with('info', 'Silakan buat restoran Anda terlebih dahulu sebelum mengelola menu.');
        }

        // Urutkan dari yang terbaru (latest)
        $menus = $restaurant->menus()->latest()->get();

        return view('menu.index', compact('menus', 'restaurant'));
    }

    public function create(Request $request)
    {
        $restaurant = $request->user()->restaurant;

        if (!$restaurant) {
            return redirect()->route('restaurant.create')->with('info', 'Silakan buat restoran Anda terlebih dahulu sebelum menambah menu.');
        }

        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255', // Validasi kategori baru
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
            'category' => $request->category, // Simpan kategori ke database
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'is_available' => true,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit(Request $request, Menu $menu)
    {
        $restaurant = $request->user()->restaurant;

        // Pastikan menu ini milik restoran user yang sedang login
        if (!$restaurant || $menu->restaurant_id !== $restaurant->id) {
            abort(403, 'Anda tidak memiliki akses untuk mengedit menu ini.');
        }

        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $restaurant = $request->user()->restaurant;

        if (!$restaurant || $menu->restaurant_id !== $restaurant->id) {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255', // Validasi kategori baru saat edit
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_available' => 'nullable|boolean'
        ]);

        $imagePath = $menu->image;

        if ($request->hasFile('image')) {
            if ($menu->image && Storage::disk('public')->exists($menu->image)) {
                Storage::disk('public')->delete($menu->image);
            }
            $imagePath = $request->file('image')->store('menus', 'public');
        }

        $menu->fill([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'is_available' => $request->has('is_available') ? $request->is_available : $menu->is_available,
        ]);
        $menu->save(); 
        // ------------------------------------------------------

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy(Request $request, Menu $menu)
    {
        $restaurant = $request->user()->restaurant;

        if (!$restaurant || $menu->restaurant_id !== $restaurant->id) {
            abort(403, 'Akses ditolak.');
        }

        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }

        Menu::destroy($menu->id);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}