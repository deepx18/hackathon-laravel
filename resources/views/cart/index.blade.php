@extends('layouts.app')
@section('title', 'My Cart')
@section('content')
<h1>My Cart</h1>

@if(!$cart || $cart->items->isEmpty())
    <div class="empty-message">
        <p>Your cart is empty.</p>
        <p><a href="/products">Browse our products</a></p>
    </div>
@else
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Line Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cart->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>${{ number_format($item->product->price, 2) }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.update', $item) }}" style="display: flex; gap: 0.5rem;">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="99" style="width: 80px;">
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.remove', $item) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #e74c3c;">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><strong>Subtotal</strong></td>
                <td colspan="2">
                    <strong>${{ number_format($cart->items->sum(fn($i) => $i->quantity * $i->product->price), 2) }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>

    <div style="text-align: center; margin-top: 2rem;">
        <form method="POST" action="{{ route('order.checkout') }}">
            @csrf
            <button type="submit" style="padding: 1rem 2rem; font-size: 1.1rem;">Checkout</button>
        </form>
    </div>
@endif
@endsection
