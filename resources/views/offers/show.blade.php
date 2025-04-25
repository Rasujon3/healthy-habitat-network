@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>{{ $offer->product_name ?? "N/A" }}</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('offers.index') }}" class="btn btn-secondary me-2">
                    Back to Products
                </a>
                <a href="{{ route('offers.edit', $offer) }}" class="btn btn-warning">
                    Edit Product
                </a>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <!-- Product Details Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Offer Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Product Name:</strong>
                                <p>{{ $offer->product_name }}</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <strong>Description:</strong>
                                <p>{{ $offer->offer_description ?? 'No description provided' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Status:</strong>
                                <p>
                                <span class="badge {{ $offer->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $offer->is_active ? 'Available' : 'Unavailable' }}
                                </span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Added:</strong>
                                <p>{{ $offer->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
