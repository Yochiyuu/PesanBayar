<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request, $restaurant_id)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        DB::beginTransaction();

        try {
            $order = Order::create([
                'restaurant_id' => $restaurant_id,
                'customer_name' => $request->customer_name,
                'table_number' => $request->table_number,
                'total_price' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
                'payment_status' => 'pending',
                'order_status' => 'waiting',
            ]);

            foreach ($cart as $menu_id => $details) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $menu_id,
                    'quantity' => $details['quantity'],
                    'price' => $details['price'],
                ]);
            }

            DB::commit();

            session()->forget('cart');

            return redirect()->route('order.show', $order->id)->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memproses pesanan.');
        }
    }

    public function show($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);
        return view('order.show', compact('order'));
    }
}