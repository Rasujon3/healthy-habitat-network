@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Service</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('services.update', $service->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-3">
                                <label for="business_id" class="col-md-4 col-form-label text-md-right">Business</label>
                                <div class="col-md-6">
                                    <select id="business_id" class="form-select @error('business_id') is-invalid @enderror" name="business_id" required>
                                        <option value="">Select Business</option>
                                        @foreach($businesses as $id => $name)
                                            <option value="{{ $id }}" {{ old('business_id', $service->business_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('business_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $service->name) }}" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3">{{ old('description', $service->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="health_benefits" class="col-md-4 col-form-label text-md-right">Health Benefits</label>
                                <div class="col-md-6">
                                    <textarea id="health_benefits" class="form-control @error('health_benefits') is-invalid @enderror" name="health_benefits" rows="3">{{ old('health_benefits', $service->health_benefits) }}</textarea>
                                    @error('health_benefits')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="certifications" class="col-md-4 col-form-label text-md-right">Certifications</label>
                                <div class="col-md-6">
                                    <textarea id="certifications" class="form-control @error('certifications') is-invalid @enderror" name="certifications" rows="3">{{ old('certifications', $service->certifications) }}</textarea>
                                    @error('certifications')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="price_category" class="col-md-4 col-form-label text-md-right">Price Category</label>
                                <div class="col-md-6">
                                    <select id="price_category" class="form-select @error('price_category') is-invalid @enderror" name="price_category" required>
                                        <option value="affordable" {{ old('price_category', $service->price_category) == 'affordable' ? 'selected' : '' }}>Affordable</option>
                                        <option value="moderate" {{ old('price_category', $service->price_category) == 'moderate' ? 'selected' : '' }}>Moderate</option>
                                        <option value="premium" {{ old('price_category', $service->price_category) == 'premium' ? 'selected' : '' }}>Premium</option>
                                    </select>
                                    @error('price_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="delivery_mode" class="col-md-4 col-form-label text-md-right">Delivery Mode</label>
                                <div class="col-md-6">
                                    <select id="delivery_mode" class="form-select @error('delivery_mode') is-invalid @enderror" name="delivery_mode" required>
                                        <option value="online" {{ old('delivery_mode', $service->delivery_mode) == 'online' ? 'selected' : '' }}>Online</option>
                                        <option value="in-person" {{ old('delivery_mode', $service->delivery_mode) == 'in-person' ? 'selected' : '' }}>In-person</option>
                                        <option value="hybrid" {{ old('delivery_mode', $service->delivery_mode) == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                    </select>
                                    @error('delivery_mode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="service_duration" class="col-md-4 col-form-label text-md-right">Service Duration</label>
                                <div class="col-md-6">
                                    <textarea id="service_duration" class="form-control @error('service_duration') is-invalid @enderror" name="service_duration" rows="3">{{ old('service_duration', $service->service_duration) }}</textarea>
                                    @error('service_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="is_available" class="col-md-4 col-form-label text-md-right">Availability</label>
                                <div class="col-md-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $service->is_available) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_available">
                                            Available
                                        </label>
                                    </div>
                                    @error('is_available')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Service
                                    </button>
                                    <a href="{{ route('services.index') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
