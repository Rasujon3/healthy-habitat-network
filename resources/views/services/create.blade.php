@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Add New Service</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('services.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Services
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Service Information</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('services.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Business Selection -->
                        <div class="col-md-6 mb-3">
                            <label for="business_id" class="form-label">Business <span class="text-danger">*</span></label>
                            <select name="business_id" id="business_id" class="form-select @error('business_id') is-invalid @enderror" required>
                                <option value="">Select a Business</option>
                                @foreach($businesses as $id => $name)
                                    <option value="{{ $id }}" {{ old('business_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('business_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Service Name -->
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Service Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Health Benefits -->
                        <div class="col-md-12 mb-3">
                            <label for="health_benefits" class="form-label">Health Benefits</label>
                            <textarea name="health_benefits" id="health_benefits" class="form-control @error('health_benefits') is-invalid @enderror" rows="3">{{ old('health_benefits') }}</textarea>
                            @error('health_benefits')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">List any known health benefits of this product.</div>
                        </div>

                        <!-- Certifications -->
                        <div class="col-md-12 mb-3">
                            <label for="certifications" class="form-label">Certifications</label>
                            <textarea name="certifications" id="certifications" class="form-control @error('certifications') is-invalid @enderror" rows="3">{{ old('certifications') }}</textarea>
                            @error('certifications')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Example: USDA Organic, Non-GMO</div>
                        </div>

                        <!-- Price Category -->
                        <div class="col-md-6 mb-3">
                            <label for="price_category" class="form-label">Price Category <span class="text-danger">*</span></label>
                            <select name="price_category" id="price_category" class="form-select @error('price_category') is-invalid @enderror" required>
                                <option value="">Select a Category</option>
                                <option value="affordable" {{ old('price_category') == 'affordable' ? 'selected' : '' }}>Affordable</option>
                                <option value="moderate" {{ old('price_category') == 'moderate' ? 'selected' : '' }}>Moderate</option>
                                <option value="premium" {{ old('price_category') == 'premium' ? 'selected' : '' }}>Premium</option>
                            </select>
                            @error('price_category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Delivery Mode -->
                        <div class="col-md-6 mb-3">
                            <label for="delivery_mode" class="form-label">Delivery Mode <span class="text-danger">*</span></label>
                            <select name="delivery_mode" id="delivery_mode" class="form-select @error('delivery_mode') is-invalid @enderror" required>
                                <option value="">Select a Category</option>
                                <option value="online" {{ old('delivery_mode') == 'online' ? 'selected' : '' }}>Online</option>
                                <option value="in-person" {{ old('delivery_mode') == 'in-person' ? 'selected' : '' }}>In-person</option>
                                <option value="hybrid" {{ old('delivery_mode') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                            </select>
                            @error('delivery_mode')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Service Duration -->
                        <div class="col-md-12 mb-3">
                            <label for="service_duration" class="form-label">Service Duration</label>
                            <textarea name="service_duration" id="service_duration" class="form-control @error('service_duration') is-invalid @enderror" rows="3">{{ old('service_duration') }}</textarea>
                            @error('service_duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Example: 1-hour session</div>
                        </div>

                        <!-- Availability (default is true from migration) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_available" id="is_available" class="form-check-input" value="1" {{ old('is_available', '1') == '1' ? 'checked' : '' }}>
                                <label for="is_available" class="form-check-label">Service is currently available</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Create Service</button>
                            <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
