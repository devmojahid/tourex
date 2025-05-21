@extends('admin.layouts.master')
@section('title', 'Destinations')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Destinations</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route('admin.tourbooking.destinations.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New Destination
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Destinations</h3>
                            <div class="card-tools">
                                <form action="{{ route('admin.tourbooking.destinations.index') }}" method="GET" class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($destinations as $destination)
                                        <tr>
                                            <td>{{ $destination->id }}</td>
                                            <td>
                                                @if($destination->image)
                                                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="img-thumbnail" width="50">
                                                @else
                                                    <span class="badge badge-secondary">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $destination->name }}</td>
                                            <td>{{ $destination->country }}</td>
                                            <td>
                                                @if($destination->status)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if($destination->is_featured)
                                                    <span class="badge badge-info">Yes</span>
                                                @else
                                                    <span class="badge badge-secondary">No</span>
                                                @endif
                                            </td>
                                            <td>{{ $destination->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.tourbooking.destinations.edit', $destination) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.tourbooking.destinations.show', $destination) }}" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <form action="{{ route('admin.tourbooking.destinations.update-status', $destination) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm {{ $destination->status ? 'btn-success' : 'btn-danger' }}" title="{{ $destination->status ? 'Deactivate' : 'Activate' }}">
                                                            <i class="fas {{ $destination->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.tourbooking.destinations.update-featured', $destination) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-sm {{ $destination->is_featured ? 'btn-info' : 'btn-secondary' }}" title="{{ $destination->is_featured ? 'Unfeature' : 'Feature' }}">
                                                            <i class="fas fa-star"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.tourbooking.destinations.destroy', $destination) }}" method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this destination?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">No destinations found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $destinations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endpush 