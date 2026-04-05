<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, $restaurant_id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'table_number' => 'required|string|max:10',
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:0',
            'items.*.price' => 'required|integer|min:0',
        ]);

        $totalPrice = 0;
        $hasItems = false;

        foreach ($request->items as $item) {
            if ($item['quantity'] > 0) {
                $totalPrice += ($item['price'] * $item['quantity']);
                $hasItems = true;
            }
        }

        if (!$hasItems) {
            return back();
        }

        $order = Order::create([
            'restaurant_id' => $restaurant_id,
            'customer_name' => $request->customer_name,
            'table_number' => $request->table_number,
            'total_price' => $totalPrice,
            'payment_status' => 'unpaid',
            'order_status' => 'pending',
        ]);

        foreach ($request->items as $item) {
            if ($item['quantity'] > 0) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['menu_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        }

        return redirect()->route('order.show', $order->id);
    }

    public function show($id)
    {
        $order = Order::with('orderItems.menu')->findOrFail($id);

        return view('order.show', compact('order'));
    }
}