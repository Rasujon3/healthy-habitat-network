@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>{{ $service->name }}</h1>
                <h5 class="text-muted">
                    {{ $service->business->business_name ?? 'Unknown Business' }}
                </h5>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('services.index') }}" class="btn btn-secondary me-2">
                    Back to Services
                </a>
                <a href="{{ route('services.edit', $service) }}" class="btn btn-warning">
                    Edit Service
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
                        <h5 class="mb-0">Service Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Status:</strong>
                                <p>
                                <span class="badge {{ $service->is_available ? 'bg-success' : 'bg-danger' }}">
                                    {{ $service->is_available ? 'Available' : 'Unavailable' }}
                                </span>
                                </p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Added:</strong>
                                <p>{{ $service->created_at->format('F j, Y') }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Delivery Modes:</strong>
                                <p>{{ $service->delivery_mode ?? 'No delivery modes provided' }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Service Duration:</strong>
                                <p>{{ $service->service_duration ?? 'No service duration added' }}</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <strong>Description:</strong>
                                <p>{{ $service->description ?? 'No description provided' }}</p>
                            </div>
                            <div class="col-md-12">
                                <strong>Health Benefits:</strong>
                                <p>{{ $service->health_benefits ?? 'No health benefits provided' }}</p>
                            </div>
                            <div class="col-md-12">
                                <strong>Certifications:</strong>
                                <p>{{ $service->certifications ?? 'No certifications added' }}</p>
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
                        @if($service->business)
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Business Name:</strong>
                                    <p>{{ $service->business->business_name }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Contact:</strong>
                                    <p>{{ $service->business->contact_email ?? 'No contact information' }}</p>
                                </div>
                                <div class="col-md-12">
                                    <strong>About:</strong>
                                    <p>{{ $service->business->description ?? 'No description provided' }}</p>
                                </div>
                                @if($service->business->website)
                                    <div class="col-md-12">
                                        <a href="{{ $service->business->website }}" class="btn btn-outline-primary btn-sm" target="_blank">
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
                            <h2 class="mb-0">{{ $service->votes->count() }}</h2>
                            <p class="text-muted">Total Votes</p>

                            @if(Auth::check() && Auth::user()->resident)
                                @php
                                    $userVote = $service->votes->where('resident_id', Auth::user()->resident->id)->first();
                                @endphp

                                @if($userVote)
                                    <div class="alert alert-success">
                                        You've already voted for this service!
                                    </div>
                                    <form action="{{ route('service-votes.destroy', $userVote) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Remove My Vote</button>
                                    </form>
                                @else
                                    <form action="{{ route('service-votes.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        <input type="hidden" name="vote_value" value="1">
                                        <button type="submit" class="btn btn-success">
                                            Vote for This Service
                                        </button>
                                    </form>
                                @endif
                            @elseif(!Auth::check())
                                <div class="alert alert-info">
                                    <a href="{{ route('login') }}">Login</a> to vote for this service.
                                </div>
                            @elseif(!Auth::user()->resident)
                                <div class="alert alert-info">
                                    <a href="{{ route('resident.create') }}">Complete your profile</a> to vote for this service.
                                </div>
                            @endif
                        </div>

                        @if($service->votes->count() > 0)
                            <h6>Recent Votes:</h6>
                            <ul class="list-group">
                                @foreach($service->votes->take(5) as $vote)
                                    <li class="list-group-item">
                                        <strong>{{ $vote->resident->user->name ?? 'Anonymous' }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $vote->created_at->format('M j, Y') }}</small>
                                    </li>
                                @endforeach
                            </ul>

                            @if($service->votes->count() > 5)
                                <p class="text-center mt-3">
                                    <small class="text-muted">+ {{ $service->votes->count() - 5 }} more votes</small>
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
                        <h5 class="mb-0">Service Timeline</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Added
                                <span>{{ $service->created_at->format('M j, Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Last Updated
                                <span>{{ $service->updated_at->format('M j, Y') }}</span>
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
                            <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service? This action cannot be undone.');">
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
