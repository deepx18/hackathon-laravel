@extends('layouts.app')
@section('title', 'My Orders')
@section('content')
<h1>My Orders</h1>

@if($orders->isEmpty())
    <div class="empty-message">
        <p>You have no orders yet.</p>
        <p><a href="/">Start shopping</a></p>
    </div>
@else
    <table>
        <thead>
            <tr>
                <th>Order #</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td><span class="badge badge-{{ $order->status }}">{{ ucfirst($order->status) }}</span></td>
                <td><a href="{{ route('order.show', $order) }}">View Details</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="margin-top: 2rem;">
        {{ $orders->links('pagination::bootstrap-4') }}
    </div>
@endif
@endsection
