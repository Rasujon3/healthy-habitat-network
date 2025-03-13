<!-- resources/views/auth/register-choice.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">I am a Resident</h5>
                                        <p class="card-text flex-grow-1">Register as a resident to vote on health and wellness products in your area.</p>
                                        <a href="{{ route('register.resident') }}" class="btn btn-primary">Register as Resident</a>
                                    </div>
                                </div>
                            </div>
                            {{--
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">I am a Business</h5>
                                        <p class="card-text flex-grow-1">Register your health and wellness business to list products and services.</p>
                                        <a href="{{ route('register.business') }}" class="btn btn-primary">Register as Business</a>
                                    </div>
                                </div>
                            </div>
                            --}}
                            <div class="col-md-6 mb-3">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">I am a new User</h5>
                                        <p class="card-text flex-grow-1">Register your health and wellness business to list products and services.</p>
                                        <a href="{{ route('register.guest') }}" class="btn btn-primary">Register as Guest User</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        Already have an account? <a href="{{ route('login') }}">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
