@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Offers</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('offers.create') }}" class="btn btn-primary">
                    Add New Offer
                </a>
            </div>
        </div>

        <!-- Offers Table -->
        @if($offers->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Offer</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr>
                                <td>{{ $offer->product_name ?? '' }}</td>
                                <td>{{ $offer->offer_description ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $offer->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $offer->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('offers.show', $offer) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('offers.edit', $offer) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('offers.destroy', $offer) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this offer?')">Delete</button>
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
                    <p class="mb-0">No Offer found. Try adjusting your filters or <a href="{{ route('offers.create') }}">add a new offer</a>.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
