@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Area</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('areas.update', $area->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-3">
                                <label for="area_name" class="col-md-4 col-form-label text-md-right">Product Name</label>
                                <div class="col-md-6">
                                    <input id="area_name" type="text" class="form-control @error('area_name') is-invalid @enderror"
                                           name="area_name" value="{{ old('area_name', $area->area_name) }}" required>
                                    @error('area_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                                              name="description" rows="3">{{ old('description', $area->description) }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Council Contact Name -->
                            <div class="form-group row mb-3">
                                <label for="area_name" class="col-md-4 col-form-label text-md-right">Council Contact
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" name="council_contact" id="council_contact"
                                           class="form-control @error('council_contact') is-invalid @enderror"
                                           value="{{ old('council_contact', $area->council_contact) }}" required>
                                    @error('council_contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Product
                                    </button>
                                    <a href="{{ route('areas.index') }}" class="btn btn-secondary">
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
