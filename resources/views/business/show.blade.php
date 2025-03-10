@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>{{ $business->business_name }}</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('businesses.index') }}" class="btn btn-secondary me-2">
                    Back to Businesses
                </a>
                <a href="{{ route('businesses.edit', $business) }}" class="btn btn-warning">
                    Edit Business
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <!-- Product Details Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Business Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Business Name:</strong>
                                <p>{{ $business->business_name ?? 'No Business name provided' }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Contact Info:</strong>
                                <p>{{ $business->contact_info ?? 'No Contact Info provided' }}</p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Description:</strong>
                                <p>{{ $business->description ?? 'No description provided' }}</p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Status:</strong>
                                <p>{{ $business->status ?? 'No status provided' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
