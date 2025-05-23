@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Service Types') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Service Types') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Service Types') }}</p>
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
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div
                                            class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">
                                                    {{ __('translate.All Service Types') }}</h4>
                                                <a href="{{ route('admin.tourbooking.service-types.create') }}"
                                                    class="crancy-btn "><i class="fa fa-plus"></i>
                                                    {{ __('translate.Add New Service Type') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3  no-footer" id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Icon/Image') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Name') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Services Count') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Featured') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Status') }}</th>
                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            @foreach ($serviceTypes as $serviceType)
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($serviceType->image)
                                                            <img src="{{ asset('storage/' . $serviceType->image) }}"
                                                                alt="{{ $serviceType->translation->name ?? $serviceType->name }}"
                                                                width="60">
                                                        @elseif($serviceType->icon)
                                                            <i class="{{ $serviceType->icon }}"
                                                                style="font-size: 24px;"></i>
                                                        @else
                                                            <i class="fa fa-cubes" style="font-size: 24px;"></i>
                                                        @endif
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ $serviceType->translation->name ?? $serviceType->name }}
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        {{ $serviceType->services->count() }}</td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($serviceType->is_featured)
                                                            <span
                                                                class="crancy-badge crancy-badge-success">{{ __('translate.Yes') }}</span>
                                                        @else
                                                            <span
                                                                class="crancy-badge crancy-badge-gray">{{ __('translate.No') }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($serviceType->status)
                                                            <span
                                                                class="crancy-badge crancy-badge-success">{{ __('translate.Active') }}</span>
                                                        @else
                                                            <span
                                                                class="crancy-badge crancy-badge-danger">{{ __('translate.Inactive') }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="{{ route('admin.tourbooking.service-types.edit', ['service_type' => $serviceType->id, 'lang_code' => admin_lang()]) }}"
                                                            class="crancy-action__btn crancy-action__edit crancy-btn"><i
                                                                class="fa fa-edit"></i>
                                                            {{ __('translate.Edit') }}
                                                        </a>
                                                        <a href="{{ route('admin.tourbooking.service-types.show', $serviceType->id) }}"
                                                            class="crancy-action__btn crancy-action__view crancy-btn"><i
                                                                class="fa fa-eye"></i>
                                                        </a>

                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $serviceType->id }}"
                                                            class="crancy-action__btn crancy-action__delete crancy-btn delete_danger_btn"><i
                                                                class="fa fa-trash"></i>
                                                        </a>
                                                    </td>

                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="deleteModal{{ $serviceType->id }}"
                                                        tabindex="-1" aria-labelledby="deleteModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">
                                                                        {{ __('translate.Confirm Delete') }}
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ __('translate.Are you sure you want to delete this service type?') }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="crancy-btn crancy-btn__default"
                                                                        data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                                                                    <form
                                                                        action="{{ route('admin.tourbooking.service-types.destroy', $serviceType->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="crancy-btn crancy-btn__danger">{{ __('translate.Delete') }}</button>
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
            $(document).ready(function() {
                $('#crancy-table__service-types').DataTable({
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
