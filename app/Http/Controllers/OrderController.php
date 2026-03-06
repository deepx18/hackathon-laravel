<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function checkout(): RedirectResponse
    {
        $cart = auth()->user()
            ->cart()
            ->with('items.product')
            ->firstOrFail();

        if ($cart->items->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $total = $cart->items->sum(
            fn ($item) => $item->quantity * $item->product->price
        );

        $order = Order::create([
            'user_id' => auth()->id(),
            'total'   => $total,
            'status'  => 'pending',
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        $cart->items()->delete();

        return redirect()
            ->route('order.history')
            ->with('success', 'Order placed successfully!');
    }

    public function history()
    {
        $orders = auth()->user()
            ->orders()
            ->latest()
            ->paginate(10);

        return view('orders.history', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }
}