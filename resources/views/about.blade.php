@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="about-hero-section bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="text-white fw-bold mb-3">About Healthy Habitat Network</h1>
                    <p class="text-white mb-4">
                        Our mission is to create a sustainable ecosystem where wellness-focused businesses and environmentally conscious consumers can connect and thrive together.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="about-hero-image rounded p-4" style="background-color: rgba(255, 255, 255, 0.2);">
                        <img src="{{ asset('images/about-illustration.png') }}" alt="About Illustration" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="our-story-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h2 class="text-center fw-bold mb-4">Our Story</h2>
                    <div class="card border-0 shadow-sm p-4 mb-5">
                        <p class="mb-3">
                            Healthy Habitat Network was founded in 2023 with a simple but powerful vision: to make sustainable and health-conscious living accessible to everyone. We recognized the growing disconnect between consumers who want to make environmentally friendly choices and the businesses offering these solutions.
                        </p>
                        <p class="mb-0">
                            What started as a small directory of local wellness businesses has grown into a comprehensive platform connecting thousands of eco-conscious consumers with verified sustainable product and service providers across the country.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="our-values-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Our Core Values</h2>

            <div class="row">
                <!-- Sustainability -->
                <div class="col-md-4 mb-4">
                    <div class="value-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="value-icon mb-3 text-success">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22c4.97 0 9-4.03 9-9s-4.03-9-9-9-9 4.03-9 9 4.03 9 9 9z" stroke="#2E8B57" stroke-width="2"/>
                                <path d="M12 6v6l4 2" stroke="#2E8B57" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold">Sustainability</h3>
                        <p class="text-muted">We believe in promoting businesses and practices that prioritize environmental stewardship and long-term planetary health.</p>
                    </div>
                </div>

                <!-- Community -->
                <div class="col-md-4 mb-4">
                    <div class="value-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="value-icon mb-3 text-success">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="#2E8B57" stroke-width="2"/>
                                <circle cx="9" cy="7" r="4" stroke="#2E8B57" stroke-width="2"/>
                                <path d="M23 21v-2a4 4 0 00-3-3.87" stroke="#2E8B57" stroke-width="2"/>
                                <path d="M16 3.13a4 4 0 010 7.75" stroke="#2E8B57" stroke-width="2"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold">Community</h3>
                        <p class="text-muted">We foster connections between like-minded individuals and businesses to create a supportive ecosystem for sustainable growth.</p>
                    </div>
                </div>

                <!-- Wellness -->
                <div class="col-md-4 mb-4">
                    <div class="value-card text-center p-4 h-100 bg-white rounded shadow-sm">
                        <div class="value-icon mb-3 text-success">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.93 19.07A10 10 0 1119.07 4.93 10 10 0 014.93 19.07" stroke="#2E8B57" stroke-width="2"/>
                                <path d="M12 16v-4m0-4h.01" stroke="#2E8B57" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="fw-bold">Wellness</h3>
                        <p class="text-muted">We champion holistic approaches to health that benefit individuals, communities, and the planet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="team-section py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Meet Our Team</h2>

            <div class="row">
                <!-- Team Member 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center p-4">
                        <div class="team-img-wrapper mb-3">
                            <img src="https://i.ibb.co/YZCkmL7/ruhul-amin-sujon.png" alt="Team Member" class="img-fluid rounded-circle team-img">
                        </div>
                        <h3 class="fw-bold">Emma Johnson</h3>
                        <p class="text-success mb-2">Founder & CEO</p>
                        <p class="text-muted">Environmental scientist with a passion for creating sustainable business models.</p>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center p-4">
                        <div class="team-img-wrapper mb-3">
                            <img src="https://www.daktars.com/uploads/doctor/avatar/65/07ahmed.png" alt="Team Member" class="img-fluid rounded-circle team-img">
                        </div>
                        <h3 class="fw-bold">David Chen</h3>
                        <p class="text-success mb-2">Chief Operations Officer</p>
                        <p class="text-muted">Former wellness industry executive focused on scaling ethical businesses.</p>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="team-card text-center p-4">
                        <div class="team-img-wrapper mb-3">
                            <img src="https://rasujon3.github.io/penguin-fashion/images/model.png" alt="Team Member" class="img-fluid rounded-circle team-img">
                        </div>
                        <h3 class="fw-bold">Sophia Martinez</h3>
                        <p class="text-success mb-2">Community Director</p>
                        <p class="text-muted">Community organizer specializing in building connections between businesses and consumers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Us Section -->
    <section class="join-us-section py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="fw-bold mb-4">Join Our Network</h2>
                    <p class="mb-4">Whether you're a business offering sustainable products or a consumer looking for healthier alternatives, there's a place for you in our growing community.</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('register') }}" class="btn btn-success px-4 py-2 me-3">Sign Up Today</a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-success px-4 py-2">Contact Us</a>
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

        .btn-outline-success {
            color: #2E8B57;
            border-color: #2E8B57;
        }

        .btn-outline-success:hover {
            background-color: #2E8B57;
            color: white;
        }

        .text-success {
            color: #2E8B57 !important;
        }

        .about-hero-image {
            position: relative;
            max-width: 400px;
            margin: 0 auto;
        }

        .team-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 4px solid #2E8B57;
        }

        .value-card, .team-card {
            transition: transform 0.3s ease;
        }

        .value-card:hover, .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
@endsection
