@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>{{ $product->product_name }}</h1>
                <h5 class="text-muted">
                    {{ $product->business->business_name ?? 'Unknown Business' }}
                </h5>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('products.index') }}" class="btn btn-secondary me-2">
                    Back to Products
                </a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                    Edit Product
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <!-- Product Details Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Product Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Product Type:</strong>
                                <p>{{ $product->product_type }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Price:</strong>
                                <p>
                                    ${{ number_format($product->price, 2) }}
                                    <span class="badge {{ $product->price_category == 'affordable' ? 'bg-success' :
                                      ($product->price_category == 'moderate' ? 'bg-primary' : 'bg-purple') }} ms-2">
                                    {{ ucfirst($product->price_category) }}
                                </span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Status:</strong>
                                <p>
                                <span class="badge {{ $product->is_available ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->is_available ? 'Available' : 'Unavailable' }}
                                </span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Added:</strong>
                                <p>{{ $product->created_at->format('F j, Y') }}</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <strong>Description:</strong>
                                <p>{{ $product->description ?? 'No description provided' }}</p>
                            </div>
                            <div class="col-md-12">
                                <strong>Health Benefits:</strong>
                                <p>{{ $product->health_benefits ?? 'No health benefits provided' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Information Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Business Information</h5>
                    </div>
                    <div class="card-body">
                        @if($product->business)
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Business Name:</strong>
                                    <p>{{ $product->business->business_name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Contact:</strong>
                                    <p>{{ $product->business->contact_email ?? 'No contact information' }}</p>
                                </div>
                                <div class="col-md-12">
                                    <strong>About:</strong>
                                    <p>{{ $product->business->description ?? 'No description provided' }}</p>
                                </div>
                                @if($product->business->website)
                                    <div class="col-md-12">
                                        <a href="{{ $product->business->website }}" class="btn btn-outline-primary btn-sm" target="_blank">
                                            Visit Website
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @else
                            <p class="text-muted">Business information not available</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Votes Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Community Feedback</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h2 class="mb-0">{{ $product->votes->count() }}</h2>
                            <p class="text-muted">Total Votes</p>

                            @if(Auth::check() && Auth::user()->resident)
                                @php
                                    $userVote = $product->votes->where('resident_id', Auth::user()->resident->id)->first();
                                @endphp

                                @if($userVote)
                                    <div class="alert alert-success">
                                        You've already voted for this product!
                                    </div>
                                    <form action="{{ route('votes.destroy', $userVote) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Remove My Vote</button>
                                    </form>
                                @else
                                    <form action="{{ route('votes.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-success">
                                            Vote for This Product
                                        </button>
                                    </form>
                                @endif
                            @elseif(!Auth::check())
                                <div class="alert alert-info">
                                    <a href="{{ route('login') }}">Login</a> to vote for this product.
                                </div>
                            @elseif(!Auth::user()->resident)
                                <div class="alert alert-info">
                                    <a href="{{ route('resident.create') }}">Complete your profile</a> to vote for this product.
                                </div>
                            @endif
                        </div>

                        @if($product->votes->count() > 0)
                            <h6>Recent Votes:</h6>
                            <ul class="list-group">
                                @foreach($product->votes->take(5) as $vote)
                                    <li class="list-group-item">
                                        <strong>{{ $vote->resident->user->name ?? 'Anonymous' }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $vote->created_at->format('M j, Y') }}</small>
                                    </li>
                                @endforeach
                            </ul>

                            @if($product->votes->count() > 5)
                                <p class="text-center mt-3">
                                    <small class="text-muted">+ {{ $product->votes->count() - 5 }} more votes</small>
                                </p>
                            @endif
                        @else
                            <p class="text-center text-muted">No votes yet</p>
                        @endif
                    </div>
                </div>

                <!-- Date Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Product Timeline</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Added
                                <span>{{ $product->created_at->format('M j, Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Last Updated
                                <span>{{ $product->updated_at->format('M j, Y') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Admin Actions -->
                @if(Auth::check() && Auth::user()->is_admin)
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">Admin Actions</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">Delete Product</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
