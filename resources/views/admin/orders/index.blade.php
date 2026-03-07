@extends('layouts.app')
@section('title', 'Manage Orders')
@section('content')
<h1>All Orders</h1>

@if($orders->isEmpty())
    <div class="empty-message">
        <p>No orders found.</p>
    </div>
@else
    <table>
        <thead>
            <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.orders.update', $order) }}" style="display: flex; gap: 0.5rem;">
                        @csrf
                        @method('PATCH')
                        <select name="status">
                            @foreach(['pending', 'shipped', 'delivered'] as $status)
                                <option value="{{ $status }}" @selected($order->status === $status)>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" style="padding: 0.5rem;">Update</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="margin-top: 2rem;">
        {{ $orders->links('pagination::bootstrap-4') }}
    </div>
@endif
@endsection
