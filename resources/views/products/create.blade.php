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

                <form action="{{ route('products.store') }}" method="POST">
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

                        <!-- Product Type -->
                        <div class="col-md-6 mb-3">
                            <label for="product_type" class="form-label">Product Type <span class="text-danger">*</span></label>
                            <input type="text" name="product_type" id="product_type" class="form-control @error('product_type') is-invalid @enderror" value="{{ old('product_type') }}" required>
                            @error('product_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Example: Supplement, Food, Protein Powder, etc.</div>
                        </div>

                        <!-- Product Name -->
                        <div class="col-md-12 mb-3">
                            <label for="product_name" class="form-label">Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" required>
                            @error('product_name')
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

                        <!-- Price -->
                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" step="0.01" min="0" required>
                            </div>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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

                        <!-- Availability (default is true from migration) -->
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_available" id="is_available" class="form-check-input" value="1" {{ old('is_available', '1') == '1' ? 'checked' : '' }}>
                                <label for="is_available" class="form-check-label">Product is currently available</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Create Product</button>
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
