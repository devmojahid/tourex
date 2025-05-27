{{-- @extends('admin.layouts.master')
@section('title', 'Destinations')
@section('content') --}}

@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Destinations') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Destinations') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Destinations') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                        <h4 class="crancy-product-card__title">{{ __('translate.All Destinations') }}</h4>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('admin.tourbooking.destinations.create') }}"
                                                class="crancy-btn"><i class="fa fa-plus"></i>
                                                {{ __('translate.Add New Destination') }}</a>
                                        </div>
                                    </div>
                                </div>


                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">ID</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Image</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Name</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Country</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Status</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Featured</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Created At</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            @forelse($destinations as $destination)
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ $destination->id }}</td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($destination->image)
                                                            <img src="{{ asset('storage/' . $destination->image) }}"
                                                                alt="{{ $destination->name }}" class="img-thumbnail"
                                                                width="50">
                                                        @else
                                                            <span class="badge badge-secondary">No
                                                                Image</span>
                                                        @endif
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ $destination->name }}</td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ $destination->country }}</td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($destination->status)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($destination->is_featured)
                                                            <span class="badge badge-info">Yes</span>
                                                        @else
                                                            <span class="badge badge-secondary">No</span>
                                                        @endif
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ $destination->created_at->format('d M, Y') }}
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="{{ route('admin.tourbooking.destinations.edit', $destination) }}"
                                                            class="crancy-action__btn crancy-action__edit crancy-btn">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.tourbooking.destinations.show', $destination) }}"
                                                            class="crancy-action__btn crancy-action__edit crancy-btn">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <form
                                                            action="{{ route('admin.tourbooking.destinations.update-status', $destination) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="destination crancy-btn crancy-action__btn crancy-action__edit crancy-btn {{ $destination->status ? 'btn-success' : 'btn-danger' }}"
                                                                title="{{ $destination->status ? 'Deactivate' : 'Activate' }}">
                                                                <i
                                                                    class="fas {{ $destination->status ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                                            </button>
                                                        </form>
                                                        <form
                                                            action="{{ route('admin.tourbooking.destinations.update-featured', $destination) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="destination crancy-btn crancy-action__btn crancy-action__edit crancy-btn {{ $destination->is_featured ? 'btn-info' : 'btn-secondary' }}"
                                                                title="{{ $destination->is_featured ? 'Unfeature' : 'Feature' }}">
                                                                <i class="fas fa-star"></i>
                                                            </button>
                                                        </form>
                                                        <form
                                                            action="{{ route('admin.tourbooking.destinations.destroy', $destination) }}"
                                                            method="POST" class="d-inline delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="destination crancy-btn crancy-action__btn crancy-action__edit crancy-btn delete_danger_btn"
                                                                onclick="return confirm('Are you sure you want to delete this destination?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">No
                                                        destinations found</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
@endpush
