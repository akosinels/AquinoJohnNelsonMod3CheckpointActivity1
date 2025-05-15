<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::with(['order.customer', 'item'])->latest()->get();
        $orders = Order::with('customer')->get();
        $items = Item::all();
        return view('order-details.index', compact('orderDetails', 'orders', 'items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);

        OrderDetail::create($validated);
        return redirect()->route('order-details.index')->with('success', 'Order detail created successfully.');
    }

    public function edit(OrderDetail $orderDetail)
    {
        $orders = Order::with('customer')->get();
        $items = Item::all();
        return view('order-details.edit', compact('orderDetail', 'orders', 'items'));
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ]);

        $orderDetail->update($validated);
        return redirect()->route('order-details.index')->with('success', 'Order detail updated successfully.');
    }

    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('order-details.index')->with('success', 'Order detail deleted successfully.');
    }

    public function show($transNo, $orderNo, $itemId, $name, $price, $qty)
    {
        return view('order-details.show', [
            'transNo' => $transNo,
            'orderNo' => $orderNo,
            'itemId' => $itemId,
            'name' => $name,
            'price' => $price,
            'qty' => $qty
        ]);
    }
} 