@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1>{{ $area->area_name }}</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('areas.index') }}" class="btn btn-secondary me-2">
                    Back to Areas
                </a>
                <a href="{{ route('areas.edit', $area) }}" class="btn btn-warning">
                    Edit Areas
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <!-- Product Details Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Area Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Area Name:</strong>
                                <p>{{ $area->area_name ?? 'No area name provided' }}</p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Description:</strong>
                                <p>{{ $area->description ?? 'No description provided' }}</p>
                            </div>

                            <div class="col-md-12 mb-3">
                                <strong>Council Contact:</strong>
                                <p>{{ $area->council_contact ?? 'No Council Contact provided' }}</p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <strong>Added:</strong>
                                <p>{{ $area->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
