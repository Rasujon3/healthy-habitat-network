@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Filters -->
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="h5 mb-0">Filters</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('votes.popular') }}" method="GET">
                    <div class="row">
                        <!-- Area Filter -->
                        <div class="col-md-3 mb-3">
                            <label for="area_id" class="form-label">Filter by Area</label>
                            <select name="area_id" id="area_id" class="form-select">
                                <option value="">All Areas</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" {{ isset($selectedArea) && $selectedArea == $area->id ? 'selected' : '' }}>
                                        {{ $area->area_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filter Button -->
                        <div class="col-md-3 d-flex align-items-end mb-3">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-filter"></i> Apply Filter
                            </button>
                            <a href="{{ route('votes.popular') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle"></i> Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-header bg-white">
            <h5 class="mb-0">Popular Products {{ isset($selectedArea) ? 'in Selected Area' : 'Across All Areas' }}</h5>
        </div>
        <!-- Products Table -->
        <div class="card-body">
            @if($products->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                        <tr>
                            <th>Rank</th>
                            <th>Product</th>
                            <th>Business</th>
                            <th>Areas with Votes</th>
                            <th>Total Positive Votes</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <strong>{{ $product->product_name }}</strong>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $product->business->business_name ?? 'N/A' }}</td>

                                <td>
                                    <div class="area-votes">
                                        @foreach($product->areaVotes as $areaVote)
                                            <span class="badge bg-light text-dark border me-1">
                                                {{ $areaVote->area_name }}: {{ $areaVote->vote_count }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success">{{ $product->positive_votes }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No products found with the selected filters.
                </div>
            @endif
        </div>
    </div>
@endsection
