@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Services</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('services.create') }}" class="btn btn-primary">
                    Add New Service
                </a>
            </div>
        </div>

        <!-- Filters -->
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="h5 mb-0">Filters</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('services.index') }}" method="GET">
                    <div class="row">
                        <!-- Keyword Search -->
                        <div class="col-md-3 mb-3">
                            <label for="search" class="form-label">Search by Service Name</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search service..." class="form-control">
                        </div>

                        <!-- Price Category Filter -->
                        <div class="col-md-3 mb-3">
                            <label for="price_category" class="form-label">Price Category</label>
                            <select name="price_category" id="price_category" class="form-select">
                                <option value="">All Categories</option>
                                <option value="affordable" {{ request('price_category') == 'affordable' ? 'selected' : '' }}>Affordable</option>
                                <option value="moderate" {{ request('price_category') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="premium" {{ request('price_category') == 'premium' ? 'selected' : '' }}>Premium</option>
                            </select>
                        </div>

                        <!-- Delivery Mode Filter -->
                        <div class="col-md-3 mb-3">
                            <label for="delivery_mode" class="form-label">Delivery Mode</label>
                            <select name="delivery_mode" id="delivery_mode" class="form-select">
                                <option value="">All Delivery Modes</option>
                                <option value="online" {{ request('delivery_mode') == 'online' ? 'selected' : '' }}>Online</option>
                                <option value="in-person" {{ request('delivery_mode') == 'in-person' ? 'selected' : '' }}>In-person</option>
                                <option value="hybrid" {{ request('delivery_mode') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                        </div>

                        <!-- Filter Button -->
                        <div class="col-md-3 d-flex align-items-end mb-3">
                            <button type="submit" class="btn btn-secondary me-2">
                                Apply Filters
                            </button>
                            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
                                Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products Table -->
        @if($products->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Business</th>
                            <th>Category</th>
                            <th>Delivery Modes</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->business->business_name ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $product->price_category == 'affordable' ? 'bg-success' :
                                          ($product->price_category == 'moderate' ? 'bg-primary' : 'bg-purple') }}">
                                        {{ ucfirst($product->price_category) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $product->delivery_mode == 'online' ? 'bg-success' :
                                          ($product->delivery_mode == 'hybrid' ? 'bg-primary' : 'bg-purple') }}">
                                        {{ ucfirst($product->delivery_mode) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge {{ $product->is_available ? 'bg-success' : 'bg-danger' }}">
                                        {{ $product->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('services.show', $product) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('services.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('services.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->appends(request()->query())->links() }}
            </div>
        @else
            <div class="card">
                <div class="card-body text-center">
                    <p class="mb-0">No services found. Try adjusting your filters or <a href="{{ route('services.create') }}">add a new service</a>.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
