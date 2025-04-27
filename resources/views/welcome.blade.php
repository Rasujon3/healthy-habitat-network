@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-section bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="text-white fw-bold mb-3">Cultivating Wellness and Sustainability</h1>
                    <p class="text-white mb-4">
                        Connecting you with businesses that offer health and wellness products and services for a sustainable lifestyle.
                    </p>
                    <a href="{{ route('products.index') }}" class="btn btn-success px-4 py-2">Explore Now</a>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="hero-image rounded-circle p-4" style="background-color: rgba(255, 255, 255, 0.2);">
                        <img src="{{ asset('images/yoga_illustration_prev_ui.png') }}" alt="Wellness Illustration" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="services-section py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Our Services</h2>

            <div class="row">
                <!-- Healthy Eating Programs -->
                <div class="col-md-4 mb-4">
                    <div class="service-card text-center p-4 h-100 bg-light rounded">
                        <div class="service-icon mb-3 text-success">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="#2E8B57"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold">Healthy Eating Programs</h3>
                        <p class="text-muted">Nutrition counseling and organic meal delivery options</p>
                    </div>
                </div>

                <!-- Fitness and Wellness -->
                <div class="col-md-4 mb-4">
                    <div class="service-card text-center p-4 h-100 bg-light rounded">
                        <div class="service-icon mb-3 text-success">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22c4.97 0 9-4.03 9-9s-4.03-9-9-9-9 4.03-9 9 4.03 9 9 9zm-4.79-2.67C5.79 18.18 5 16.18 5 14c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.39 0-2.68-.41-3.79-1.12" stroke="#2E8B57" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold">Fitness and Wellness</h3>
                        <p class="text-muted">Yoga, meditation, and personal training sessions</p>
                    </div>
                </div>

                <!-- Sustainable Living -->
                <div class="col-md-4 mb-4">
                    <div class="service-card text-center p-4 h-100 bg-light rounded">
                        <div class="service-icon mb-3 text-success">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3L4 9v12h16V9l-8-6z" stroke="#2E8B57" stroke-width="2"/>
                                <path d="M9 14a3 3 0 106 0 3 3 0 00-6 0z" stroke="#2E8B57" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold">Sustainable Living</h3>
                        <p class="text-muted">Eco-friendly home cleaning and sustainable gardening</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Products Section -->
    <section class="products-section py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Popular Products</h2>

            <div class="row">
                <!-- Reusable Health Products -->
                <div class="col-md-6 mb-4">
                    <div class="product-card d-flex p-3 border rounded h-100">
                        <div class="product-icon me-3 text-success align-self-center">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 8h-1V6c0-2.21-1.79-4-4-4H7C4.79 2 3 3.79 3 6v12c0 2.21 1.79 4 4 4h10c2.21 0 4-1.79 4-4v-8c0-1.1-.9-2-2-2z" stroke="#2E8B57" stroke-width="2"/>
                                <path d="M12 12c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1z" fill="#2E8B57"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="fw-bold">Reusable Health Products</h3>
                            <p class="text-muted mb-0">Nutrition counseling and organic meal delivery options</p>
                        </div>
                    </div>
                </div>

                <!-- Eco-Friendly Fitness Gear -->
                <div class="col-md-6 mb-4">
                    <div class="product-card d-flex p-3 border rounded h-100">
                        <div class="product-icon me-3 text-success align-self-center">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 9h-6V7h6v2zm-6 2h-4v2h4v-2zm-4-2h-4v2h4V9z" fill="#2E8B57"/>
                                <path d="M4 17h16v-5H4v5zm16-7V4H4v6h16z" stroke="#2E8B57" stroke-width="2"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="fw-bold">Eco-Friendly Fitness Gear</h3>
                            <p class="text-muted mb-0">Organic personal care</p>
                        </div>
                    </div>
                </div>

                <!-- Organic Personal Care -->
                <div class="col-md-6 mb-4">
                    <div class="product-card d-flex p-3 border rounded h-100">
                        <div class="product-icon me-3 text-success align-self-center">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2L8 6h3v14h2V6h3L12 2z" fill="#2E8B57"/>
                                <rect x="4" y="10" width="16" height="10" rx="2" stroke="#2E8B57" stroke-width="2"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="fw-bold">Organic Personal Care</h3>
                            <p class="text-muted mb-0">Organic personal care</p>
                        </div>
                    </div>
                </div>

                <!-- Home Wellness Products -->
                <div class="col-md-6 mb-4">
                    <div class="product-card d-flex p-3 border rounded h-100">
                        <div class="product-icon me-3 text-success align-self-center">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8h5z" stroke="#2E8B57" stroke-width="2"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="fw-bold">Home Wellness Products</h3>
                            <p class="text-muted mb-0">Air purifier</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .bg-primary {
            background-color: #2684DC !important;
        }

        .btn-success {
            background-color: #2E8B57;
            border-color: #2E8B57;
        }

        .btn-success:hover {
            background-color: #246c46;
            border-color: #246c46;
        }

        .text-success {
            color: #2E8B57 !important;
        }

        .hero-image {
            position: relative;
            max-width: 400px;
            margin: 0 auto;
        }

        .service-card, .product-card {
            transition: transform 0.3s ease;
        }

        .service-card:hover, .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
@endsection
