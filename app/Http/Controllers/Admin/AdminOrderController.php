<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\UpdateOrderStatusRequest;
use Illuminate\Http\RedirectResponse;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(UpdateOrderStatusRequest $request, Order $order): RedirectResponse
    {
        $order->update(['status' => $request->status]);
        return redirect()->route('admin.orders.index')->with('success', 'Status updated.');
    }
}
