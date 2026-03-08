@extends('layouts.app')

@section('content')
<div class="w-full">
    <!-- Hero Section -->
    <section class="relative bg-indigo-600 rounded-2xl overflow-hidden shadow-xl mb-16">
        <div class="absolute inset-0">
            <!-- Background Gradient/Pattern overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-800 to-purple-600 mix-blend-multiply flex items-center justify-center overflow-hidden">
                 <svg class="absolute right-0 top-0 transform translate-x-1/3 -translate-y-1/4 opacity-20 w-3/4 h-3/4 animate-pulse duration-[10000ms]" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <circle cx="50" cy="50" r="40" fill="white" />
                </svg>
            </div>
        </div>
        
        <div class="relative px-6 py-24 sm:py-32 lg:px-8 text-center bg-black/10 backdrop-blur-sm">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white mb-6">
                Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-200 to-indigo-200">ShopApp</span>
            </h1>
            <p class="mt-6 text-lg sm:text-xl md:text-2xl max-w-2xl mx-auto text-indigo-100 mb-10">
                Discover amazing products at unbeatable prices. The modern way to shop for premium electronics.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                @auth
                    <a href="{{ route('products') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-lg text-indigo-700 bg-white hover:bg-gray-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Start Shopping
                    </a>
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.orders.index') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 border-2 border-white text-base font-semibold rounded-full text-white hover:bg-white hover:text-indigo-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('order.history') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 border-2 border-white text-base font-semibold rounded-full text-white hover:bg-white hover:text-indigo-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                            My Orders
                        </a>
                    @endif
                @else
                    <a href="{{ route('products') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 border border-transparent text-base font-semibold rounded-full shadow-lg text-indigo-700 bg-white hover:bg-gray-50 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Shop Now
                    </a>
                    <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex justify-center items-center px-8 py-4 border-2 border-white text-base font-semibold rounded-full text-white hover:bg-white hover:text-indigo-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                        Create Account
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Why Choose Us?</h2>
            <p class="mt-4 text-lg text-gray-500">Everything you need for a seamless shopping experience.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 group-hover:bg-indigo-600 transition-colors duration-300 mb-6">
                    <svg class="h-8 w-8 text-indigo-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Fast Shipping</h3>
                <p class="text-gray-500">Quick and reliable delivery straight to your doorstep.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 group-hover:bg-indigo-600 transition-colors duration-300 mb-6">
                    <svg class="h-8 w-8 text-indigo-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Secure Checkout</h3>
                <p class="text-gray-500">100% safe and encrypted payment processing.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 group-hover:bg-indigo-600 transition-colors duration-300 mb-6">
                    <svg class="h-8 w-8 text-indigo-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Easy Returns</h3>
                <p class="text-gray-500">Hassle-free 30-day return policy for your peace of mind.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-indigo-50 group-hover:bg-indigo-600 transition-colors duration-300 mb-6">
                    <svg class="h-8 w-8 text-indigo-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">24/7 Support</h3>
                <p class="text-gray-500">Our dedicated team is always here to assist you.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="mt-16 mb-8 relative rounded-2xl overflow-hidden bg-gray-900">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900 to-gray-900 opacity-90"></div>
        <div class="relative px-6 py-16 sm:px-12 sm:py-24 text-center flex flex-col items-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Ready to Upgrade Your Tech?
            </h2>
            <p class="mt-4 text-lg leading-6 text-gray-300 max-w-2xl mx-auto mb-8">
                Explore our curated collection of the latest smart devices and accessories. Don't miss out on our exclusive online-only deals.
            </p>
            <a href="{{ route('products') }}" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-full text-gray-900 bg-white hover:bg-indigo-50 hover:shadow-lg transition-all duration-200">
                Browse Full Catalog
                <svg class="ml-2 -mr-1 w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    </section>
</div>
@endsection
