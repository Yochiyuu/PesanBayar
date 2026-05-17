<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Fungsi untuk memproses checkout pesanan
    public function store(Request $request, string $restaurant_id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang Anda masih kosong!');
        }

        // Hitung total harga untuk validasi keamanan (jangan percaya data dari frontend saja)
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // 1. Simpan data utama ke tabel 'orders'
        $order = Order::query()->create([
            'restaurant_id' => $restaurant_id,
            'customer_name' => $request->customer_name,
            'total_price'   => $totalPrice,
            'status'        => 'pending', // Status awal pesanan: Menunggu/Pending
        ]);

        // 2. Simpan setiap menu ke tabel 'order_items'
        foreach ($cart as $menu_id => $item) {
            OrderItem::query()->create([
                'order_id' => $order->id,
                'menu_id'  => $menu_id,
                'quantity' => $item['quantity'],
                'price'    => $item['price'],
            ]);
        }

        // 3. Kosongkan keranjang belanja karena sudah sukses dicheckout
        session()->forget('cart');

        // 4. Arahkan pelanggan ke halaman struk/nota digital pesanan mereka
        return redirect()->route('order.show', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    // Fungsi untuk menampilkan struk/nota digital ke pelanggan
    public function show(string $id)
    {
        // Ambil data order beserta relasi item, menu, dan restorannya
        $order = Order::query()->with(['items.menu', 'restaurant'])->findOrFail($id);

        return view('order.show', compact('order'));
    }
}