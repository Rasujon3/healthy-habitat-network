@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard') }}" data-section="overview">
                                <i class="bi bi-grid-fill"></i> Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}" data-section="products">
                                <i class="bi bi-basket-fill"></i> Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('areas.index') }}" data-section="votes">
                                <i class="bi bi-check2-square"></i> Areas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('businesses.index') }}" data-section="profile">
                                <i class="bi bi-person-fill"></i> Businesses
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2" id="section-title">Overview</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
{{--                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>--}}
{{--                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>--}}
                        </div>
                    </div>
                </div>

                <!-- Dashboard Sections -->
                <div id="dashboard-sections">
                    <!-- Overview Section -->
                    <div class="section" id="overview-section">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Products</h5>
                                        <p class="card-text display-4" id="area-products">{{ $totalProducts ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Products Voted</h5>
                                        <p class="card-text display-4" id="total-votes">{{ $totalProductVoted ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">Products Voted in Your Area</h5>
                                        <p class="card-text display-4" id="area-products">{{ $totalOwnAreaVotes ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Section -->
                    <div class="section" id="products-section" style="display:none;">
                        <h3>Available Products</h3>
                        <div id="products-list" class="row">
                            <!-- Dynamically populated -->
                            <p>No products available in your area.</p>
                        </div>
                    </div>

                    <!-- Votes Section -->
                    <div class="section" id="votes-section" style="display:none;">
                        <h3>Your Votes</h3>
                        <div id="votes-list" class="row">
                            <!-- Dynamically populated -->
                            <p>You haven't voted on any products yet.</p>
                        </div>
                    </div>

                    <!-- Profile Section -->
                    <div class="section" id="profile-section" style="display:none;">
                        <h3>Your Profile</h3>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" id="profile-name">{{ $authInfo->name ?? '' }}</h5>
                                <p class="card-text">
                                    <strong>Email:</strong> {{ $authInfo->email ?? '' }}<br>
                                    <strong>Area:</strong> <span id="profile-area">{{ Auth::user()->area->name ?? '' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navigation and Section Switching
            const navLinks = document.querySelectorAll('.nav-link');
            const sections = document.querySelectorAll('.section');
            const sectionTitle = document.getElementById('section-title');

            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all nav links
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    // Hide all sections
                    sections.forEach(section => {
                        section.style.display = 'none';
                    });

                    // Show selected section
                    const sectionToShow = document.getElementById(`${this.dataset.section}-section`);
                    sectionToShow.style.display = 'block';

                    // Update section title
                    sectionTitle.textContent = this.textContent.trim();
                });
            });

            // Simulate data loading (replace with actual AJAX calls in real implementation)
            function loadDashboardData() {
                // Total Votes
                document.getElementById('total-votes').textContent = '12';

                // Area Products
                document.getElementById('area-products').textContent = '25';

                // Interests
                const interestsList = document.getElementById('interests-list');
                const interests = ['Nutrition', 'Fitness', 'Mental Health'];
                interests.forEach(interest => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item';
                    li.textContent = interest;
                    interestsList.appendChild(li);
                });
            }

            // Load initial data
            loadDashboardData();
        });
    </script>
@endsection
