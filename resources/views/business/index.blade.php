@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Businesses</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('businesses.create') }}" class="btn btn-primary">
                    Add New Business
                </a>
            </div>
        </div>

        <!-- Products Table -->
        @if($businesses->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Business Name</th>
                            <th>Contact Info</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($businesses as $business)
                            <tr>
                                <td>{{ $business->business_name ?? 'N/A' }}</td>
                                <td>{{ $business->contact_info ? \Str::words($business->contact_info, 2, '...') : 'N/A' }}</td>
                                <td>{{ $business->description ? \Str::words($business->description, 10, '...') : 'N/A' }}</td>
                                <td>{{ $business->status ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('businesses.show', $business) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('businesses.edit', $business) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('businesses.destroy', $business) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this business?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @else
            <div class="card">
                <div class="card-body text-center">
                    <p class="mb-0">No business found. Try adjusting your filters or <a href="{{ route('businesses.create') }}">add a new business</a>.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
