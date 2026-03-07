@extends('layouts.app')

@section('content')
<div class="main-container">
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Welcome to E-Store</h1>
            <p class="hero-subtitle">Discover amazing products at great prices</p>
            
            <div class="hero-buttons">
                @auth
                    <a href="{{ route('products') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-bag"></i> Shop Now
                    </a>
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-cogs"></i> Admin Panel
                        </a>
                    @else
                        <a href="{{ route('order.history') }}" class="btn btn-secondary btn-lg">
                            <i class="fas fa-history"></i> My Orders
                        </a>
                    @endif
                @else
                    <a href="{{ route('products') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-shopping-bag"></i> Shop Now
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-user-plus"></i> Create Account
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose Us?</h2>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Fast Shipping</h3>
                    <p>Quick delivery to your door</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Secure Checkout</h3>
                    <p>Safe and secure payment processing</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-erturn"></i>
                    </div>
                    <h3>Easy Returns</h3>
                    <p>Hassle-free returns within 30 days</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Always here to help you</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2 class="cta-title">Ready to Start Shopping?</h2>
            <p class="cta-subtitle">Browse our collection of premium products</p>
            <a href="{{ route('products') }}" class="btn btn-light btn-lg">
                <i class="fas fa-arrow-right"></i> Browse Products
            </a>
        </div>
    </section>
</div>

<style>
    .main-container {
        width: 100%;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 120px 20px;
        text-align: center;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-content {
        max-width: 700px;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .hero-subtitle {
        font-size: 1.5rem;
        margin-bottom: 40px;
        opacity: 0.95;
    }

    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-lg {
        padding: 15px 40px;
        font-size: 1.1rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        font-weight: 600;
    }

    .btn-primary {
        background: #667eea;
        color: white;
        border: 2px solid #667eea;
    }

    .btn-primary:hover {
        background: #5568d3;
        border-color: #5568d3;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
        background: #764ba2;
        color: white;
        border: 2px solid #764ba2;
    }

    .btn-secondary:hover {
        background: #6a3f8f;
        border-color: #6a3f8f;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-outline-primary {
        background: transparent;
        color: white;
        border: 2px solid white;
    }

    .btn-outline-primary:hover {
        background: white;
        color: #667eea;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-light {
        background: white;
        color: #667eea;
        border: 2px solid white;
    }

    .btn-light:hover {
        background: #f0f0f0;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    /* Features Section */
    .features {
        padding: 80px 20px;
        background: #f8f9fa;
    }

    .section-title {
        font-size: 2.5rem;
        text-align: center;
        margin-bottom: 60px;
        color: #333;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .feature-card {
        background: white;
        padding: 40px 30px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .feature-icon {
        font-size: 3rem;
        color: #667eea;
        margin-bottom: 20px;
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: #333;
    }

    .feature-card p {
        color: #666;
        font-size: 1rem;
    }

    /* CTA Section */
    .cta {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 80px 20px;
        text-align: center;
    }

    .cta-title {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .cta-subtitle {
        font-size: 1.2rem;
        margin-bottom: 40px;
        opacity: 0.95;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .btn-lg {
            width: 100%;
        }

        .section-title,
        .cta-title {
            font-size: 2rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
</style>
@endsection
