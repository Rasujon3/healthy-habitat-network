<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Healthy Habitat Network') }}</title>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles (if needed) -->
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        #app {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        .bg-purple {
            background-color: #6f42c1;
            color: white;
        }
    </style>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Home
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item ">
                            <a class="nav-link {{ request()->routeIs(['dashboard', 'dashboard.*']) ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        @if(Auth::user()->localCouncil)
                            <li class="nav-item "><a class="nav-link {{ request()->routeIs(['areas', 'areas.*']) ? 'active' : '' }}" href="{{ route('areas.index') }}">Areas</a></li>
                        @endif
                        @if(Auth::user()->sme)
                            <li class="nav-item "><a class="nav-link {{ request()->routeIs(['businesses', 'businesses.*']) ? 'active' : '' }}" href="{{ route('businesses.index') }}">Businesses</a></li>
                        @endif
                            <li class="nav-item "><a class="nav-link {{ request()->routeIs(['products', 'products.*']) ? 'active' : '' }}" href="{{ route('products.index') }}">Products</a></li>
                        @if(Auth::user()->localCouncil)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs(['votes.popular', 'votes.popular.*']) ? 'active' : '' }}" href="{{ route('votes.popular') }}">Popular Products</a>
                            </li>
                        @endif
                        @if(Auth::user()->resident)
                        {{-- Offers --}}
                        <li class="nav-item ">
                            <a class="nav-link {{ request()->routeIs(['offers', 'offers.*']) ? 'active' : '' }}" href="{{ route('offers.index') }}">Offers</a>
                        </li>
                        @endif
                        {{-- Services --}}
                        <li class="nav-item ">
                            <a class="nav-link {{ request()->routeIs(['services', 'services.*']) ? 'active' : '' }}" href="{{ route('services.index') }}">Services</a>
                        </li>
                        @if(Auth::user()->localCouncil)
                        {{-- popular services --}}
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs(['service-votes.popular', 'service-votes.popular.*']) ? 'active' : '' }}" href="{{ route('service-votes.popular') }}">Popular Services</a>
                        </li>
                        @endif
                        <li class="nav-item ">
                            <a class="nav-link {{ request()->routeIs(['about', 'about.*']) ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ request()->routeIs(['contact', 'contact.*']) ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->resident)
                                    <a class="dropdown-item" href="{{ route('resident.edit', Auth::user()->resident) }}">
                                        {{ __('My Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('votes.voteHistory') }}">
                                        {{ __('Vote History') }}
                                    </a>
{{--                                @else--}}
{{--                                    <a class="dropdown-item" href="{{ route('resident.create') }}">--}}
{{--                                        {{ __('Complete Profile') }}--}}
{{--                                    </a>--}}
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="bg-light py-4 mt-4">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} Healthy Habitat Network. All rights reserved.</p>
        </div>
    </footer>
</div>

<!-- Bootstrap JS Bundle with Popper from CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
