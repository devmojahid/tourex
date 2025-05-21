@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Services') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Services') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Services') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.All Services') }}</h4>
                                            <div>
                                                <div class="dropdown">
                                                    <button class="crancy-btn dropdown-toggle" type="button" id="serviceTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ isset($serviceType) ? $serviceType->name : __('translate.Filter by Type') }}
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="serviceTypeDropdown">
                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.index') }}">{{ __('translate.All Types') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.tours') }}">{{ __('translate.Tours') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.hotels') }}">{{ __('translate.Hotels') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.restaurants') }}">{{ __('translate.Restaurants') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.rentals') }}">{{ __('translate.Rentals') }}</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.activities') }}">{{ __('translate.Activities') }}</a></li>
                                                    </ul>
                                                </div>
                                                <a href="{{ route('admin.tourbooking.services.create') }}" class="crancy-btn"><i class="fa fa-plus"></i> {{ __('translate.Add New Service') }}</a>
                                            </div>
                                        </div>

                                        <div class="crancy-product-table  mg-top-25">
                                            <table id="crancy-table__vendor">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('translate.Image') }}</th>
                                                        <th>{{ __('translate.Title') }}</th>
                                                        <th>{{ __('translate.Type') }}</th>
                                                        <th>{{ __('translate.Location') }}</th>
                                                        <th>{{ __('translate.Price') }}</th>
                                                        <th>{{ __('translate.Status') }}</th>
                                                        <th>{{ __('translate.Action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($services as $service)
                                                    <tr>
                                                        <td>
                                                            @if($service->thumbnail && $service->thumbnail->file_path)
                                                                <img src="{{ asset('storage/'.$service->thumbnail->file_path) }}" alt="{{ $service->translation->title ?? $service->title }}" width="80">
                                                            @else
                                                                <img src="{{ asset('admin/img/img-placeholder.jpg') }}" alt="No image" width="80">
                                                            @endif
                                                        </td>
                                                        <td>{{ $service->translation->title ?? $service->title }}</td>
                                                        <td>{{ $service->serviceType->name ?? 'N/A' }}</td>
                                                        <td>{{ $service->location ?? 'N/A' }}</td>
                                                        <td>
                                                            @if($service->discount_price)
                                                                <span class="text-decoration-line-through">{{ $service->full_price }}</span>
                                                                {{ $service->discount_price }}
                                                            @elseif($service->full_price)
                                                                {{ $service->full_price }}
                                                            @elseif($service->price_per_person)
                                                                {{ $service->price_per_person }} {{ __('translate.per person') }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($service->status)
                                                                <span class="crancy-badge crancy-badge-success">{{ __('translate.Active') }}</span>
                                                            @else
                                                                <span class="crancy-badge crancy-badge-danger">{{ __('translate.Inactive') }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="crancy-table__action">
                                                            <div class="crancy-table__action-btn">
                                                                <a href="{{ route('admin.tourbooking.services.edit', $service->id) }}" class="crancy-action__btn crancy-action__edit"><i class="fa fa-edit"></i></a>
                                                                <a href="{{ route('admin.tourbooking.services.show', $service->id) }}" class="crancy-action__btn crancy-action__view"><i class="fa fa-eye"></i></a>
                                                                
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $service->id }}" class="crancy-action__btn crancy-action__delete"><i class="fa fa-trash"></i></a>
                                                                
                                                                <div class="dropdown">
                                                                    <button class="crancy-action__btn" type="button" id="dropdownMenuButton{{ $service->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fa fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $service->id }}">
                                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.itineraries', $service->id) }}">{{ __('translate.Itineraries') }}</a></li>
                                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.extra-charges', $service->id) }}">{{ __('translate.Extra Charges') }}</a></li>
                                                                        <li><a class="dropdown-item" href="{{ route('admin.tourbooking.services.availability', $service->id) }}">{{ __('translate.Availability') }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">{{ __('translate.Confirm Delete') }}</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{ __('translate.Are you sure you want to delete this service?') }}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="crancy-btn crancy-btn__default" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                                                                        <form action="{{ route('admin.tourbooking.services.destroy', $service->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="crancy-btn crancy-btn__danger">{{ __('translate.Delete') }}</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row mg-top-40">
                                            <div class="col-12">
                                                {{ $services->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js_section')
<script>
    (function($) {
        "use strict"
        $(document).ready(function () {
            $('#crancy-table__vendor').DataTable({
                responsive: true,
                paging: false,
                info: false,
                searching: true,
                ordering: true,
            });
        });
    })(jQuery);
</script>
@endpush 