@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Add New Product</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Products
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Product Information</h5>
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

                <form action="{{ route('areas.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Area Name -->
                        <div class="col-md-12 mb-3">
                            <label for="area_name" class="form-label">Area Name <span class="text-danger">*</span></label>
                            <input type="text" name="area_name" id="area_name"
                                   class="form-control @error('area_name') is-invalid @enderror"
                                   value="{{ old('area_name') }}" required>
                            @error('area_name')
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

                        <!-- Council Contact Name -->
                        <div class="col-md-12 mb-3">
                            <label for="council_contact" class="form-label">Council Contact <span class="text-danger">*</span></label>
                            <input type="text" name="council_contact" id="council_contact"
                                   class="form-control @error('council_contact') is-invalid @enderror"
                                   value="{{ old('council_contact') }}" required>
                            @error('council_contact')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Create Area</button>
                            <a href="{{ route('areas.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
