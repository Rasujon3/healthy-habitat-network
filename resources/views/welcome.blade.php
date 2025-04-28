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
    <!-- Skills Development Section -->
    <section class="skills-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Grow Your Wellness Skills</h2>

            <div class="row mb-4">
                <div class="col-12 text-center mb-4">
                    <h3 class="fw-bold">Keep your wellness journey thriving with expert guidance</h3>
                </div>
            </div>

            <div class="row">
                <!-- Nutrition -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="skill-card bg-white p-4 h-100 rounded border">
                        <div class="skill-icon mb-3 text-success">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 9H9V2H7v7H5V2H3v7c0 2.12 1.66 3.84 3.75 3.97V22h2.5v-9.03C11.34 12.84 13 11.12 13 9V2h-2v7zm5-3v8h2.5v8H21V2c-2.76 0-5 2.24-5 4z" fill="#2E8B57"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold">Nutrition Mastery</h4>
                        <p class="text-muted">Learn sustainable eating habits and meal planning techniques from certified nutritionists.</p>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-success">Learn more &rarr;</a>
                    </div>
                </div>

                <!-- Fitness -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="skill-card bg-white p-4 h-100 rounded border">
                        <div class="skill-icon mb-3 text-success">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.57 14.86L22 13.43 20.57 12 17 15.57 8.43 7 12 3.43 10.57 2 9.14 3.43 7.71 2 5.57 4.14 4.14 2.71 2.71 4.14 4.14 5.57 2 7.71 3.43 9.14 2 10.57 3.43 12 7 8.43 15.57 17 12 20.57 13.43 22 14.86 20.57 16.29 22 17.71 20.57 20.57 17.71 22 16.29 20.57 14.86z" fill="#2E8B57"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold">Fitness Training</h4>
                        <p class="text-muted">Discover workout routines that fit your lifestyle with 64% faster progress.</p>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-success">Learn more &rarr;</a>
                    </div>
                </div>

                <!-- Meditation -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="skill-card bg-white p-4 h-100 rounded border">
                        <div class="skill-icon mb-3 text-success">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 16.5c-3.58 0-6.5-2.92-6.5-6.5S8.42 5.5 12 5.5s6.5 2.92 6.5 6.5-2.92 6.5-6.5 6.5z" stroke="#2E8B57" stroke-width="2"/>
                                <circle cx="12" cy="12" r="3" fill="#2E8B57"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold">Mindfulness</h4>
                        <p class="text-muted">Experience a 17% productivity boost through guided meditation and stress-relief techniques.</p>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-success">Learn more &rarr;</a>
                    </div>
                </div>

                <!-- Sustainable Living -->
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="skill-card bg-white p-4 h-100 rounded border">
                        <div class="skill-icon mb-3 text-success">
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22c4.97 0 9-4.03 9-9-4.97 0-9 4.03-9 9zM5.6 10.25c0 1.38 1.12 2.5 2.5 2.5.53 0 1.01-.16 1.42-.44l-.02.19c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5l-.02-.19c.4.28.89.44 1.42.44 1.38 0 2.5-1.12 2.5-2.5 0-1-.59-1.85-1.43-2.25.84-.4 1.43-1.25 1.43-2.25 0-1.38-1.12-2.5-2.5-2.5-.53 0-1.01.16-1.42.44l.02-.19C14.5 2.12 13.38 1 12 1S9.5 2.12 9.5 3.5l.02.19c-.4-.28-.89-.44-1.42-.44-1.38 0-2.5 1.12-2.5 2.5 0 1 .59 1.85 1.43 2.25-.84.4-1.43 1.25-1.43 2.25zM12 5.5c1.38 0 2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5S9.5 9.38 9.5 8s1.12-2.5 2.5-2.5zM3 13c0 4.97 4.03 9 9 9 0-4.97-4.03-9-9-9z" fill="#2E8B57"/>
                            </svg>
                        </div>
                        <h4 class="fw-bold">Eco-Living</h4>
                        <p class="text-muted">Save up to $27k annually with sustainable home practices and green living solutions.</p>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-success">Learn more &rarr;</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 text-center">
                    <a href="{{ route('services.index') }}" class="btn btn-success px-4 py-2">View All Courses</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Benefits Statistics Section -->
    <section class="stats-section py-5" style="background-color: #2684DC;">
        <div class="container">
            <!-- Green Checkmark -->
            <div class="row">
                <div class="col-12">
                    <div class="checkmark-container position-relative text-center">
                        <svg class="checkmark" width="120" height="120" viewBox="0 0 120 120">
                            <path class="checkmark-path" fill="none" stroke="#4AE3B5" stroke-width="12" d="M28,60 L50,80 L95,35"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-5">
                <div class="col-md-8 text-center">
                    <h2 class="text-white fw-bold mb-4">Proven Results for Your Wellness Journey</h2>
                    <p class="text-white-50">Our clients experience measurable improvements in health, sustainability, and overall wellness.</p>
                </div>
            </div>

            <div class="row">
                <!-- 30x ROI Stat -->
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="text-center position-relative">
                        <div class="stat-circle bg-purple mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <div>
                                <h3 class="text-white fw-bold m-0">30x</h3>
                                <p class="text-white mb-0">ROI</p>
                            </div>
                        </div>
                        <p class="text-white-50 mt-2">in wellness investments</p>
                    </div>
                </div>

                <!-- 17% Boost Stat -->
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="text-center">
                        <div class="stat-circle bg-teal mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <div>
                                <h3 class="text-white fw-bold m-0">17%</h3>
                                <p class="text-white mb-0">BOOST</p>
                            </div>
                        </div>
                        <p class="text-white-50 mt-2">in productivity</p>
                    </div>
                </div>

                <!-- 64% Faster Stat -->
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="text-center">
                        <div class="stat-circle bg-orange mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <div class="position-relative">
                                <h3 class="text-white fw-bold m-0">64%</h3>
                                <p class="text-white mb-0">FASTER</p>
                                <svg class="progress-ring position-absolute" width="140" height="140" viewBox="0 0 140 140">
                                    <circle class="progress-ring-circle" stroke="#FFB347" stroke-width="20" fill="transparent" r="60" cx="70" cy="70" stroke-dasharray="377" stroke-dashoffset="135"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-white-50 mt-2">onboarding and improved talent mobility</p>
                    </div>
                </div>

                <!-- $27k Savings Stat -->
                <div class="col-md-6 col-lg-3">
                    <div class="text-center">
                        <div class="stat-circle bg-blue mx-auto mb-3 d-flex align-items-center justify-content-center">
                            <div>
                                <h3 class="text-white fw-bold m-0">$27k</h3>
                                <p class="text-white mb-0">SAVINGS</p>
                            </div>
                        </div>
                        <p class="text-white-50 mt-2">per retained employee</p>
                    </div>
                </div>
            </div>

            <!-- Green Checkmark -->
            <!--
            <div class="row">
                <div class="col-12">
                    <div class="checkmark-container position-relative">
                        <svg class="checkmark" width="120" height="120" viewBox="0 0 120 120">
                            <path class="checkmark-path" fill="none" stroke="#4AE3B5" stroke-width="12" d="M28,60 L50,80 L95,35"></path>
                        </svg>
                    </div>
                </div>
            </div>
            -->
        </div>
    </section>

    <!-- Wellness Journey Timeline Section -->
    <section class="journey-section py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold mb-3">Your Wellness Evolution</h2>
                    <p class="text-muted">Discover how our holistic approach transforms your well-being at every stage</p>
                </div>
            </div>

            <div class="journey-timeline position-relative">
                <!-- Timeline Center Line -->
                <div class="timeline-line"></div>

                <!-- Stage 1 -->
                <div class="row journey-item mb-5">
                    <div class="col-md-5 journey-content">
                        <div class="journey-card bg-light p-4 rounded-lg shadow-sm">
                            <span class="journey-number">01</span>
                            <h3 class="fw-bold mt-3">Discovery</h3>
                            <p class="mb-3">Begin your wellness journey with a personalized assessment to identify your unique needs and goals.</p>
                            <div class="journey-stats d-flex align-items-center">
                                <div class="circle-progress">
                                    <svg width="60" height="60" viewBox="0 0 120 120">
                                        <circle cx="60" cy="60" r="54" fill="none" stroke="#e6e6e6" stroke-width="12" />
                                        <circle class="progress-circle" cx="60" cy="60" r="54" fill="none" stroke="#2E8B57" stroke-width="12" stroke-dasharray="339.3" stroke-dashoffset="84.8" />
                                    </svg>
                                    <span class="progress-text">75%</span>
                                </div>
                                <p class="ms-3 mb-0 small">of clients report immediate clarity about their wellness priorities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 journey-icon d-flex justify-content-center">
                        <div class="icon-circle">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-md-5 journey-image">
                        <div class="image-container rounded-circle overflow-hidden">
{{--                            <div class="image-placeholder bg-pattern-1"></div>--}}
                            <img src="{{ asset('images/discovery-man-adventure-searching.svg') }}" class="img-fluid" alt="Placeholder Image">
                        </div>
                    </div>
                </div>

                <!-- Stage 2 -->
                <div class="row journey-item mb-5">
                    <div class="col-md-5 journey-image order-md-1 order-3">
                        <div class="image-container rounded-circle overflow-hidden">
{{--                            <div class="image-placeholder bg-pattern-2"></div>--}}
                            <img src="{{ asset('images/innovation.svg') }}" class="img-fluid" alt="Placeholder Image" style="height: 100% !important;">
                        </div>
                    </div>
                    <div class="col-md-2 journey-icon d-flex justify-content-center order-md-2 order-1">
                        <div class="icon-circle">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14h-2V9h-2V7h4v10z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-md-5 journey-content order-md-3 order-2">
                        <div class="journey-card bg-light p-4 rounded-lg shadow-sm">
                            <span class="journey-number">02</span>
                            <h3 class="fw-bold mt-3">Implementation</h3>
                            <p class="mb-3">Embrace custom sustainable practices designed for your lifestyle and wellness objectives.</p>
                            <div class="journey-stats d-flex align-items-center">
                                <div class="circle-progress">
                                    <svg width="60" height="60" viewBox="0 0 120 120">
                                        <circle cx="60" cy="60" r="54" fill="none" stroke="#e6e6e6" stroke-width="12" />
                                        <circle class="progress-circle" cx="60" cy="60" r="54" fill="none" stroke="#2684DC" stroke-width="12" stroke-dasharray="339.3" stroke-dashoffset="169.6" />
                                    </svg>
                                    <span class="progress-text">50%</span>
                                </div>
                                <p class="ms-3 mb-0 small">reduction in environmental impact within the first month</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stage 3 -->
                <div class="row journey-item">
                    <div class="col-md-5 journey-content">
                        <div class="journey-card bg-light p-4 rounded-lg shadow-sm">
                            <span class="journey-number">03</span>
                            <h3 class="fw-bold mt-3">Transformation</h3>
                            <p class="mb-3">Experience holistic well-being as sustainable practices become effortless parts of your daily life.</p>
                            <div class="journey-stats d-flex align-items-center">
                                <div class="circle-progress">
                                    <svg width="60" height="60" viewBox="0 0 120 120">
                                        <circle cx="60" cy="60" r="54" fill="none" stroke="#e6e6e6" stroke-width="12" />
                                        <circle class="progress-circle" cx="60" cy="60" r="54" fill="none" stroke="#FF6B4A" stroke-width="12" stroke-dasharray="339.3" stroke-dashoffset="33.9" />
                                    </svg>
                                    <span class="progress-text">90%</span>
                                </div>
                                <p class="ms-3 mb-0 small">of clients report significant improvement in overall well-being</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 journey-icon d-flex justify-content-center">
                        <div class="icon-circle">
                            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27z" fill="white"/>
                            </svg>
                        </div>
                    </div>
                    <div class="col-md-5 journey-image">
                        <div class="image-container rounded-circle overflow-hidden">
{{--                            <div class="image-placeholder bg-pattern-3"></div>--}}
                            <img src="{{ asset('images/achievement.svg') }}" class="img-fluid" alt="Placeholder Image" style="height: 100% !important;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{  route('dashboard') }}" class="btn btn-gradient px-4 py-3 rounded-pill">Start Your Wellness Journey</a>
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
        .skill-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-color: #e9e9e9;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .btn-outline-success {
            color: #2E8B57;
            border-color: #2E8B57;
        }

        .btn-outline-success:hover {
            background-color: #2E8B57;
            color: white;
        }
        .stats-section {
            overflow: hidden;
            position: relative;
        }

        .stat-circle {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            position: relative;
            overflow: hidden;
        }

        .bg-purple {
            background-color: #5B4CFF;
            background-image: radial-gradient(circle, rgba(255,255,255,0.2) 2px, transparent 2px);
            background-size: 15px 15px;
        }

        .bg-teal {
            background-color: #00B5B8;
            background-image: linear-gradient(135deg, #00B5B8 0%, #00D4B8 100%);
        }

        .bg-orange {
            background-color: #333366;
            position: relative;
        }

        .bg-blue {
            background-color: #0099FF;
        }

        .progress-ring {
            top: -40px;
            left: -40px;
            transform: rotate(-90deg);
        }

        .progress-ring-circle {
            transition: stroke-dashoffset 0.35s;
        }

        .checkmark-container {
            position: absolute;
            /*left: 5%;*/
            top: 50%;
            transform: translateY(-50%);
        }

        .checkmark {
            width: 120px;
            height: 120px;
        }

        .checkmark-path {
            stroke-dasharray: 130;
            stroke-dashoffset: 130;
            animation: dash 1.5s ease-in-out forwards;
        }

        @keyframes dash {
            0% {
                stroke-dashoffset: 130;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }

        @media (max-width: 768px) {
            .checkmark-container {
                position: relative;
                left: 0;
                text-align: center;
                margin-top: 2rem;
            }

            .checkmark {
                width: 80px;
                height: 80px;
            }
        }
    </style>

    <style>
        .journey-section {
            padding: 80px 0;
            background-color: #f9f9f9;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(46, 139, 87, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 60%, rgba(38, 132, 220, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 50% 90%, rgba(255, 107, 74, 0.05) 0%, transparent 20%);
        }

        .journey-timeline {
            padding: 30px 0;
            position: relative;
        }

        .timeline-line {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 4px;
            background: linear-gradient(to bottom, #2E8B57, #2684DC, #FF6B4A);
            transform: translateX(-50%);
            z-index: 1;
        }

        .journey-item {
            position: relative;
            z-index: 2;
        }

        .journey-icon {
            display: flex;
            align-items: center;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #2E8B57, #2684DC);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 3;
        }

        .journey-item:nth-child(2) .icon-circle {
            background: linear-gradient(135deg, #2684DC, #2E8B57);
        }

        .journey-item:nth-child(3) .icon-circle {
            background: linear-gradient(135deg, #2684DC, #FF6B4A);
        }

        .journey-card {
            border-radius: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .journey-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
        }

        .journey-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 6px;
            height: 100%;
            background: linear-gradient(to bottom, #2E8B57, #2684DC);
        }

        .journey-item:nth-child(2) .journey-card::before {
            background: linear-gradient(to bottom, #2684DC, #2E8B57);
        }

        .journey-item:nth-child(3) .journey-card::before {
            background: linear-gradient(to bottom, #2684DC, #FF6B4A);
        }

        .journey-number {
            font-size: 3rem;
            font-weight: 700;
            color: rgba(0, 0, 0, 0.05);
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .image-container {
            width: 250px;
            height: 250px;
            margin: 0 auto;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .image-placeholder {
            width: 100%;
            height: 100%;
        }

        .bg-pattern-1 {
            background-color: #e4f7ed;
            background-image:
                radial-gradient(#2E8B57 10%, transparent 11%),
                radial-gradient(#2E8B57 10%, transparent 11%);
            background-size: 10px 10px;
            background-position: 0 0, 30px 30px;
            opacity: 0.3;
        }

        .bg-pattern-2 {
            background-color: #e6f4fd;
            background-image: linear-gradient(45deg, #2684DC 25%, transparent 25%, transparent 50%, #2684DC 50%, #2684DC 75%, transparent 75%, transparent);
            background-size: 20px 20px;
            opacity: 0.3;
        }

        .bg-pattern-3 {
            background-color: #fee9e3;
            background-image:
                repeating-linear-gradient(45deg, #FF6B4A 0, #FF6B4A 1px, transparent 0, transparent 50%),
                repeating-linear-gradient(135deg, #FF6B4A 0, #FF6B4A 1px, transparent 0, transparent 50%);
            background-size: 10px 10px;
            opacity: 0.3;
        }

        .circle-progress {
            position: relative;
            width: 60px;
            height: 60px;
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.9rem;
            font-weight: 700;
        }

        .progress-circle {
            transform: rotate(-90deg);
            transform-origin: center;
            stroke-linecap: round;
            transition: stroke-dashoffset 1s ease-in-out;
        }

        .btn-gradient {
            background: linear-gradient(135deg, #2E8B57, #2684DC);
            color: white;
            font-weight: 600;
            border: none;
            box-shadow: 0 4px 15px rgba(46, 139, 87, 0.3);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #246c46, #2070b9);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(46, 139, 87, 0.4);
            color: white;
        }

        @media (max-width: 767px) {
            .timeline-line {
                left: 30px;
            }

            .journey-content {
                margin-bottom: 20px;
            }

            .journey-icon {
                justify-content: flex-start;
                padding-left: 30px;
                margin-bottom: 20px;
            }

            .image-container {
                width: 200px;
                height: 200px;
                margin-bottom: 40px;
            }
        }
    </style>
@endsection
