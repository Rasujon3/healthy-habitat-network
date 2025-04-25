@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Offer</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('offers.update', $offer->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-3">
                                <label for="product_id" class="col-md-4 col-form-label text-md-right">Product</label>
                                <div class="col-md-6">
                                    <select id="product_id" class="form-select @error('product_id') is-invalid @enderror" name="product_id" required>
                                        <option value="">Select Product</option>
                                        @foreach($products as $id => $name)
                                            <option value="{{ $id }}" {{ old('product_id', $offer->product_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="offer_description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea id="offer_description" class="form-control @error('offer_description') is-invalid @enderror" name="offer_description" rows="3">{{ old('offer_description', $offer->offer_description) }}</textarea>
                                    @error('offer_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="is_active" class="col-md-4 col-form-label text-md-right">Active</label>
                                <div class="col-md-6 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $offer->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active Offer
                                        </label>
                                    </div>
                                    @error('is_active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Offer
                                    </button>
                                    <a href="{{ route('offers.index') }}" class="btn btn-secondary">
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
