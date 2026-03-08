<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ShopApp') - Modern E-Commerce</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="h-full flex flex-col text-gray-900">

<!-- Navigation -->
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('main.index') }}" class="flex-shrink-0 flex items-center gap-2">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="font-bold text-xl tracking-tight text-gray-900">ShopApp</span>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:ml-10 md:flex md:space-x-8">
                    <a href="{{ route('products') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition-colors">
                        All Products
                    </a>
                </div>
            </div>

            <!-- Right side menu -->

            <!-- Right side menu -->
            <div class="flex items-center">
                @guest
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition-colors">Log in</a>
                        <a href="{{ route('register') }}" class="bg-indigo-600 text-white hover:bg-indigo-700 px-4 py-2 rounded-full text-sm font-medium transition-colors shadow-sm">Sign up</a>
                    </div>
                @endguest

                @auth
                    <div class="flex items-center space-x-6">
                        @if(!auth()->user()->hasRole('admin'))
                            <!-- Cart Icon -->
                            <a href="{{ route('cart.index') }}" class="text-gray-500 hover:text-indigo-600 relative transition-colors group p-2">
                                <span class="sr-only">Cart</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <!-- Cart Badge (Placeholder) -->
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-red-600 rounded-full group-hover:bg-red-700 transition-colors">3</span>
                            </a>
                        @endif

                        <!-- User Dropdown (Simplified for layout) -->
                        <div class="relative flex items-center gap-4">
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.orders.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Admin Panel</a>
                            @else
                                <a href="{{ route('order.history') }}" class="text-sm font-medium text-gray-500 hover:text-gray-900">Orders</a>
                            @endif
                            
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="text-sm font-medium text-gray-500 hover:text-red-600 transition-colors">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth

                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center md:hidden ml-4">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div class="md:hidden hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('products') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Products</a>
        </div>
    </div>
</nav>

<!-- Flash Messages -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
    @if(session('success'))
        <div class="rounded-md bg-green-50 p-4 mb-4 border border-green-200">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="rounded-md bg-red-50 p-4 mb-4 border border-red-200">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Main Content -->
<main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-white border-t border-gray-200 mt-auto">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-1">
                <span class="flex items-center gap-2 font-bold text-xl tracking-tight text-gray-900 mb-4">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    ShopApp
                </span>
                <p class="text-gray-500 text-sm">
                    Your one-stop destination for the latest electronics and gadgets. Quality guaranteed.
                </p>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Shop</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('products') }}" class="text-base text-gray-500 hover:text-gray-900">All Products</a></li>
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Smartphones</a></li>
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Laptops</a></li>
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Accessories</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Support</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Contact Us</a></li>
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">FAQ</a></li>
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Shipping Info</a></li>
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Returns</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900 tracking-wider uppercase mb-4">Legal</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Privacy Policy</a></li>
                    <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8 flex items-center justify-between">
            <p class="text-base text-gray-400">
                &copy; {{ date('Y') }} ShopApp, Inc. All rights reserved.
            </p>
            <div class="flex space-x-6">
                <!-- Social Icons (Placeholders) -->
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
