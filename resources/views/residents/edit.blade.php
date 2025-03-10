@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Resident</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('resident.update', $resident->id) }}">
                            @csrf
                            @method('PUT')
                            <!-- User Selection -->
                            <input id="user_id" name="user_id" value="{{ Auth::user()->id }}" hidden="hidden">
                            <!-- Area Selection -->
                            <div class="col-md-12 mb-3">
                                <label for="area_id">Area</label>
                                <select class="form-select @error('area_id') is-invalid @enderror" id="area_id" name="area_id" required>
                                    <option value="">Select Area</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}" {{ old('area_id', $resident->area_id) == $area->id ? 'selected' : '' }}>{{ $area->area_name }}</option>
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
                                    value="{{ old('name',$resident->name) }}"
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
                                    value="{{ old('age_group', $resident->age_group) }}"
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
                                    <option value="male" {{ old('gender', $resident->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $resident->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $resident->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Interest Areas -->
                            <div class="col-md-12 mb-3">
                                <label for="interest_areas">Interest Areas</label>
                                <select class="form-select @error('interest_areas') is-invalid @enderror" id="interest_areas" name="interest_areas[]" multiple required>
                                    @php
                                        // Decode the interest_areas field into an array
                                        $interestAreas = json_decode($resident->interest_areas, true);
                                    @endphp

                                    <option value="education" {{ in_array('education', old('interest_areas', $interestAreas)) ? 'selected' : '' }}>Education</option>
                                    <option value="healthcare" {{ in_array('healthcare', old('interest_areas', $interestAreas)) ? 'selected' : '' }}>Healthcare</option>
                                    <option value="environment" {{ in_array('environment', old('interest_areas', $interestAreas)) ? 'selected' : '' }}>Environment</option>
                                    <option value="technology" {{ in_array('technology', old('interest_areas', $interestAreas)) ? 'selected' : '' }}>Technology</option>
                                    <option value="sports" {{ in_array('sports', old('interest_areas', $interestAreas)) ? 'selected' : '' }}>Sports</option>
                                    <!-- Add more options as needed -->
                                </select>
                                @error('interest_areas')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Resident
                                    </button>
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
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
