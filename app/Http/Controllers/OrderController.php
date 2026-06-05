<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB; // Tambahkan facade DB untuk keamanan transaksi

class OrderController extends Controller
{
    // Fungsi untuk memproses checkout pesanan
    public function store(Request $request, string $restaurant_id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);

        // PERBAIKAN 1: Gunakan Facade Session agar Intelephense tidak error
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang Anda masih kosong!');
        }

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        // MENGGUNAKAN DB TRANSACTION: Jika satu proses gagal (misal server error), semua dibatalkan
        try {
            DB::beginTransaction();

            // 1. Simpan data utama ke tabel 'orders'
            $order = Order::query()->create([
                'restaurant_id'  => $restaurant_id,
                'customer_name'  => $request->customer_name,
                'table_number'   => 'N/A', 
                'total_price'    => $totalPrice,
                'payment_status' => 'unpaid',
                'order_status'   => 'pending', 
                'snap_token'     => null,
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

            // PERBAIKAN 2: Gunakan Facade Session
            Session::forget('cart');

            DB::commit(); // Konfirmasi dan simpan semua data secara permanen ke database

            return redirect()->route('order.show', $order->id)->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack(); // Batalkan semua perubahan database jika terjadi error
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem saat memproses pesanan: ' . $e->getMessage());
        }
    }

    // Fungsi untuk menampilkan struk/nota digital ke pelanggan
    public function show(string $id)
    {
        $order = Order::query()->with(['items.menu', 'restaurant'])->findOrFail($id);

        return view('order.show', compact('order'));
    }

    // Fungsi untuk pemilik restoran mengubah status pesanan
    public function updateStatus(Request $request, string $id)
    {
        $request->validate([
            'order_status' => 'required|in:pending,proses,selesai',
        ]);

        $order = Order::query()->findOrFail($id);

        // Keamanan: Pastikan pesanan ini milik restoran user yang sedang login
        if ($order->restaurant->user_id !== $request->user()->id) {
            abort(403, 'Akses Ditolak');
        }

        // PERBAIKAN 3: Ubah cara update agar ramah Intelephense
        $order->order_status = $request->order_status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }
}