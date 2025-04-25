@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>Add New Offer</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('offers.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Offers
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Offer Information</h5>
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

                <form action="{{ route('offers.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Product Selection -->
                        <div class="col-md-6 mb-3">
                            <label for="product_id" class="form-label">Product <span class="text-danger">*</span></label>
                            <select name="product_id" id="product_id" class="form-select @error('product_id') is-invalid @enderror" required>
                                <option value="">Select a Product</option>
                                @foreach($products as $id => $name)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label for="offer_description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="offer_description" id="offer_description" class="form-control @error('offer_description') is-invalid @enderror" rows="3" required>{{ old('offer_description') }}</textarea>
                            @error('offer_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Ex. 5%, 10%, 15%, etc.</div>
                        </div>

                        <!-- Active -->
                        <div class="col-md-12 mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">Active Offer</label>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Create Offer</button>
                            <a href="{{ route('offers.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
