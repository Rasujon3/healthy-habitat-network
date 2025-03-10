@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Business</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('businesses.update', $business->id) }}">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="col-md-12 mb-3">
                                <label for="business_name" class="form-label">Business Name <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    name="business_name"
                                    id="business_name"
                                    class="form-control @error('business_name') is-invalid @enderror"
                                    value="{{ old('business_name', $business->business_name) }}"
                                    required
                                >
                                @error('business_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Contact Info -->
                            <div class="col-md-12 mb-3">
                                <label for="contact_info" class="form-label">Contact Info</label>
                                <textarea name="contact_info" id="contact_info" class="form-control @error('contact_info') is-invalid @enderror" rows="3">{{ old('contact_info', $business->contact_info) }}</textarea>
                                @error('contact_info')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $business->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Business Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="">Select a Status</option>
                                    <option value="active" {{ old('status', $business->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $business->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Business
                                    </button>
                                    <a href="{{ route('businesses.index') }}" class="btn btn-secondary">
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
