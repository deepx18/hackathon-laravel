<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Shop')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
        }
        nav {
            background: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background 0.3s;
        }
        nav a:hover {
            background: rgba(255,255,255,0.1);
        }
        .nav-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .alert {
            padding: 1rem;
            margin: 1rem 2rem;
            border-radius: 4px;
            border-left: 4px solid;
        }
        .alert-success {
            background: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        .alert-error {
            background: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        h1 {
            margin-bottom: 1rem;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin: 1rem 0;
        }
        th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }
        td {
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
        }
        tr:last-child td {
            border-bottom: none;
        }
        tr:hover {
            background: #f8f9fa;
        }
        tfoot tr {
            background: #f8f9fa;
            border-top: 2px solid #dee2e6;
        }
        form {
            display: inline;
        }
        input, select, button, textarea {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font: inherit;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }
        button {
            background: #3498db;
            color: white;
            cursor: pointer;
            border: none;
            transition: background 0.3s;
        }
        button:hover {
            background: #2980b9;
        }
        button[type="submit"] {
            padding: 0.75rem 1.5rem;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }
        .badge-shipped {
            background: #cfe2ff;
            color: #084298;
        }
        .badge-delivered {
            background: #d1e7dd;
            color: #0f5132;
        }
        .empty-message {
            text-align: center;
            padding: 2rem;
            color: #666;
        }
        .form-group {
            margin: 1rem 0;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem 0;
        }
        .pagination a, .pagination span {
            padding: 0.5rem 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #3498db;
        }
        .pagination a:hover {
            background: #f8f9fa;
        }
        .pagination .active span {
            background: #3498db;
            color: white;
            border-color: #3498db;
        }
    </style>
</head>
<body>
<nav>
    <div>
        <a href="{{ route('main.index') }}" style="font-size: 1.2rem; font-weight: bold;">🛒 ShopApp</a>
    </div>
    <div class="nav-group">
        @guest
            <a href="{{ route('products') }}">Products</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest

        @auth
            <a href="{{ route('products') }}">Products</a>
            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.orders.index') }}">Manage Orders</a>
            @else
                <a href="{{ route('cart.index') }}">Cart</a>
                <a href="{{ route('order.history') }}">My Orders</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="background: #e74c3c; margin: 0;">Logout</button>
            </form>
        @endauth
    </div>
</nav>

{{-- Flash messages --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

<main>
    @yield('content')
</main>
</body>
</html>
