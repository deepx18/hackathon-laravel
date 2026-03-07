@extends('layouts.app')
@section('title', 'Order #' . $order->id)
@section('content')
<h1>Order #{{ $order->id }}</h1>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
    <div>
        <p><strong>Placed:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
        <p><strong>Status:</strong> <span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span></p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Unit Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>${{ number_format($item->price, 2) }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>${{ number_format($order->total, 2) }}</strong></td>
        </tr>
    </tfoot>
</table>

<div style="margin-top: 2rem;">
    <a href="{{ route('order.history') }}" style="padding: 0.5rem 1rem; background: #6c757d; color: white; border-radius: 4px; text-decoration: none; display: inline-block;">← Back to Orders</a>
</div>
@endsection
