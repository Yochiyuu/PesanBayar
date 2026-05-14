<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Menambahkan menu ke keranjang
    public function add(Request $request, $menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        $cart = session()->get('cart', []);

        // Jika menu sudah ada di keranjang, tambah quantity-nya
        if (isset($cart[$menu_id])) {
            $cart[$menu_id]['quantity']++;
        } else {
            // Jika belum ada, masukkan data menu baru
            $cart[$menu_id] = [
                "name" => $menu->name,
                "quantity" => 1,
                "price" => $menu->price,
                "image" => $menu->image,
                "restaurant_id" => $menu->restaurant_id
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu ditambahkan ke keranjang!');
    }

    // Mengurangi atau menghapus menu dari keranjang
    public function remove(Request $request, $menu_id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$menu_id])) {
            if ($cart[$menu_id]['quantity'] > 1) {
                $cart[$menu_id]['quantity']--;
            } else {
                unset($cart[$menu_id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    // Halaman melihat isi keranjang sebelum checkout
  public function index()
{
    $cart = session()->get('cart', []);
    $total = 0;
    $restaurant_id = null;

    foreach($cart as $item) {
        $total += $item['price'] * $item['quantity'];
        $restaurant_id = $item['restaurant_id'];
    }

    return view('cart.index', compact('cart', 'total', 'restaurant_id'));
}
}