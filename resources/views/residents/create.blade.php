@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Create Resident</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Products
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Create Resident</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('resident.store') }}" method="POST">
                    @csrf

                    <!-- User Selection -->
                    <input id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden="hidden">
                    <!-- Area Selection -->
                    <div class="col-md-12 mb-3">
                        <label for="area_id">Area</label>
                        <select class="form-select @error('area_id') is-invalid @enderror" id="area_id" name="area_id" required>
                            <option value="">Select Area</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>{{ $area->area_name }}</option>
                            @endforeach
                        </select>
                        @error('area_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Resident Name -->
                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Age Group -->
                    <div class="col-md-12 mb-3">
                        <label for="age_group" class="form-label">Age Group <span class="text-danger">*</span></label>
                        <input
                            type="text"
                            name="age_group"
                            id="age_group"
                            class="form-control @error('age_group') is-invalid @enderror"
                            value="{{ old('age_group') }}"
                            required
                        >
                        @error('age_group')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div class="col-md-12 mb-3">
                        <label for="gender">Gender</label>
                        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Interest Areas -->
                    <div class="col-md-12 mb-3">
                        <label for="interest_areas">Interest Areas</label>
                        <select class="form-select @error('interest_areas') is-invalid @enderror" id="interest_areas" name="interest_areas[]" multiple required>
                            <option value="education" {{ in_array('education', old('interest_areas', [])) ? 'selected' : '' }}>Education</option>
                            <option value="healthcare" {{ in_array('healthcare', old('interest_areas', [])) ? 'selected' : '' }}>Healthcare</option>
                            <option value="environment" {{ in_array('environment', old('interest_areas', [])) ? 'selected' : '' }}>Environment</option>
                            <option value="technology" {{ in_array('technology', old('interest_areas', [])) ? 'selected' : '' }}>Technology</option>
                            <option value="sports" {{ in_array('sports', old('interest_areas', [])) ? 'selected' : '' }}>Sports</option>
                            <!-- Add more options as needed -->
                        </select>
                        @error('interest_areas')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save Resident</button>
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
