<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')->latest()->get();
        $customers = Customer::all();
        return view('orders.index', compact('orders', 'customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'total_amount' => 'required|numeric|min:0'
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show($customerId, $name, $orderNo, $date)
    {
        return view('orders.show', [
            'customerId' => $customerId,
            'name' => $name,
            'orderNo' => $orderNo,
            'date' => $date
        ]);
    }

    public function edit(Order $order)
    {
        $customers = Customer::all();
        return view('orders.edit', compact('order', 'customers'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'total_amount' => 'required|numeric|min:0'
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
} 