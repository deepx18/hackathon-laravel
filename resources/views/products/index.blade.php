@extends('layouts.app')
@section('title', 'Products')
@section('content')
<h1>Our Products</h1>

@if($products->isEmpty())
    <div class="empty-message">
        <p>No products available at the moment.</p>
    </div>
@else
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1.5rem; margin: 2rem 0;">
        @foreach($products as $product)
            <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s;">
                <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 200px; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                    📦
                </div>
                <div style="padding: 1.5rem;">
                    <h3 style="margin: 0 0 0.5rem 0; color: #2c3e50;">{{ $product->name }}</h3>
                    <p style="margin: 0 0 1rem 0; color: #666; font-size: 0.9rem;">Product ID: #{{ $product->id }}</p>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 1.5rem; font-weight: bold; color: #27ae60;">${{ number_format($product->price, 2) }}</span>
                        @auth
                            <form method="POST" action="{{ route('cart.add') }}" style="margin: 0;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" style="padding: 0.5rem 1rem; background: #3498db; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background 0.3s;">
                                    Add to Cart
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" style="padding: 0.5rem 1rem; background: #95a5a6; color: white; border-radius: 4px; text-decoration: none; display: inline-block;">
                                Login to Buy
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div style="display: flex; justify-content: center; margin-top: 3rem;">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
@endif
@endsection
