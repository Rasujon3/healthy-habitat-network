<!-- resources/views/auth/register-resident.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Resident Registration') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/register/resident') }}">
                            @csrf

                            <div class="mb-3 row">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="area_id" class="col-md-4 col-form-label text-md-end">{{ __('Area') }}</label>
                                <div class="col-md-6">
                                    <select id="area_id" class="form-select @error('area_id') is-invalid @enderror" name="area_id" required>
                                        <option value="">Select your area</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="age_group" class="col-md-4 col-form-label text-md-end">{{ __('Age Group') }}</label>
                                <div class="col-md-6">
                                    <select id="age_group" class="form-select @error('age_group') is-invalid @enderror" name="age_group" required>
                                        <option value="">Select your age group</option>
                                        <option value="18-24" {{ old('age_group') == '18-24' ? 'selected' : '' }}>18-24</option>
                                        <option value="25-34" {{ old('age_group') == '25-34' ? 'selected' : '' }}>25-34</option>
                                        <option value="35-44" {{ old('age_group') == '35-44' ? 'selected' : '' }}>35-44</option>
                                        <option value="45-54" {{ old('age_group') == '45-54' ? 'selected' : '' }}>45-54</option>
                                        <option value="55-64" {{ old('age_group') == '55-64' ? 'selected' : '' }}>55-64</option>
                                        <option value="65+" {{ old('age_group') == '65+' ? 'selected' : '' }}>65+</option>
                                    </select>
                                    @error('age_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                <div class="col-md-6">
                                    <select id="gender" class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                                        <option value="">Select your gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="non-binary" {{ old('gender') == 'non-binary' ? 'selected' : '' }}>Non-binary</option>
                                        <option value="prefer-not-to-say" {{ old('gender') == 'prefer-not-to-say' ? 'selected' : '' }}>Prefer not to say</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="interests" class="col-md-4 col-form-label text-md-end">{{ __('Health Interests') }}</label>
                                <div class="col-md-6">
                                    <textarea id="interests" class="form-control @error('interests') is-invalid @enderror" name="interests" placeholder="Nutrition, Fitness, Mental health, etc.">{{ old('interests') }}</textarea>
                                    @error('interests')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register Resident') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer text-center">
                        Already have an account? <a href="{{ route('login') }}">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
