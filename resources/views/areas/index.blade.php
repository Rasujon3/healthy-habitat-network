@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Areas</h1>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('areas.create') }}" class="btn btn-primary">
                    Add New Area
                </a>
            </div>
        </div>

        <!-- Areas Table -->
        @if($areas->count() > 0)
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($areas as $area)
                            <tr>
                                <td>{{ $area->area_name }}</td>
                                <td>{{ \Str::words($area->description, 20, '...') }}</td>
                                <td>
                                    <a href="{{ route('areas.show', $area) }}" class="btn btn-sm btn-info">View</a>
                                    <a href="{{ route('areas.edit', $area) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('areas.destroy', $area) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this area?')">Delete</button>
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
                    <p class="mb-0">No areas found. Try adjusting your filters or <a href="{{ route('areas.create') }}">add a new product</a>.</p>
                </div>
            </div>
        @endif
    </div>
@endsection
