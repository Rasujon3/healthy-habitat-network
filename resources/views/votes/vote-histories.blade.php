@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Product Vote List</h2>
        <!-- Products Table -->
        @if($products->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Votes</th>
                            <th>Voted At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_name ?? 'N/A' }}</td>
                                <td>{{ $product->description ? \Str::words($product->description, 10, '...') : 'N/A' }}</td>
                                <td>{{ $product->positive_votes ?? 'N/A' }}</td>
                                <td>{{ $product->votes->first()->created_at ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">View</a>
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
        <div class="divider"></div>
        <h2>Service Vote List</h2>
        <!-- Products Table -->
        @if($services->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Votes</th>
                            <th>Voted At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->product_name ?? 'N/A' }}</td>
                                <td>{{ $service->description ? \Str::words($service->description, 10, '...') : 'N/A' }}</td>
                                <td>{{ $service->positive_votes ?? 'N/A' }}</td>
                                <td>{{ $service->votes->first()->created_at ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-sm btn-info">View</a>
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
                    <p class="mb-0">No business found. Try adjusting your filters or <a href="{{ route('services.create') }}">add a new business</a>.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
