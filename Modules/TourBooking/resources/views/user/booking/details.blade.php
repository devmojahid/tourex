@extends('user.master_layout')
@section('title')
    <title>{{ __('translate.Invoice') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Invoice') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Invoice') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">

                            <div class="row justify-content-center">
                                <div class="col-10 mg-top-30">
                                    <div class="ed-invoice-page-wrapper">
                                        <div class="ed-invoice-main-wrapper">

                                            <div class="ed-invoice-page">
                                                <div class="ed-inv-logo-area">
                                                    <div class="ed-main-logo">
                                                        <img src="{{ asset($general_setting->logo) }}" alt="logo"
                                                            class="ed-logo">
                                                    </div>
                                                    <div>

                                                    </div>
                                                </div>

                                                <div class="ed-inv-billing-info">
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">{{ __('translate.Billed To') }}
                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('translate.Name') }}:</td>
                                                                <td> {{ $booking->customer_name ?? 'NA' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Phone') }}:</td>
                                                                <td>{{ $booking?->customer_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Email') }}:</td>
                                                                <td>{{ $booking?->customer_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Address') }} : </td>
                                                                <td> {{ $booking?->customer_address }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="ed-inv-billing-info">
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">
                                                            {{ __('translate.Booking Information') }}
                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('translate.Invoice No') }}:</td>
                                                                <td>#{{ $booking->booking_code }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Booking Status') }}:</td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-{{ $booking->booking_status == 'confirmed' ? 'success' : ($booking->booking_status == 'pending' ? 'warning' : ($booking->booking_status == 'cancelled' ? 'danger' : 'info')) }}">
                                                                        {{ ucfirst($booking->booking_status) }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Payment Status') }} : </td>
                                                                <td>
                                                                    <span
                                                                        class="badge bg-{{ $booking->payment_status == 'completed' ? 'success' : 'warning' }}">
                                                                        {{ ucfirst($booking->payment_status) }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Payment Method') }} : </td>
                                                                <td>
                                                                    {{ currency($booking->total) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Total Amount') }} : </td>
                                                                <td>
                                                                    {{ ucfirst($booking->payment_method) }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Paid Amount') }} : </td>
                                                                <td>
                                                                    {{ currency($booking->paid_amount) }}
                                                                </td>
                                                            </tr>
                                                            @if ($booking->due_amount > 0)
                                                                <tr>
                                                                    <td>{{ __('translate.Due Amount') }} : </td>
                                                                    <td>
                                                                        {{ currency($booking->due_amount) }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </table>

                                                    </div>
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">
                                                            {{ __('translate.Service Information') }}
                                                        </p>
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('translate.Title') }}:</td>
                                                                <td> {{ $booking->service->title ?? 'NA' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Location') }} : </td>
                                                                <td>{{ $booking?->service?->location }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Check in Date') }}:</td>
                                                                <td>{{ date('d M Y', strtotime($booking->check_in_date)) }}
                                                                </td>
                                                            </tr>
                                                            @if ($booking->check_out_date)
                                                                <tr>
                                                                    <td>{{ __('translate.Check out Date') }}:</td>
                                                                    <td>{{ date('d M Y', strtotime($booking->check_out_date)) }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                            <tr>
                                                                <td>{{ __('translate.Adults') }} : </td>
                                                                <td> {{ $booking?->adults }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{ __('translate.Children') }} : </td>
                                                                <td> {{ $booking?->children }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td>{{ __('translate.Infants') }} : </td>
                                                                <td> {{ $booking?->infants }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                @if ($booking->customer_notes)
                                                    <div class="row mb-4">
                                                        <div class="col-md-12">
                                                            <h6 class="text-muted">{{ __('translate.Your Notes') }}</h6>
                                                            <p>{{ $booking->customer_notes }}</p>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="ed-inv-table-content">
                                                    <p class="ed-inv-table-headline">{{ __('translate.Course List') }} </p>
                                                    <div class="ed-inv-invoice-table-main-wrapper">
                                                        <div class="ed-inv-invoice-table-wrapper">
                                                            <table class="ed-inv-invoice-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            {{ __('translate.SN') }}
                                                                        </th>

                                                                        <th>
                                                                            {{ __('translate.Instructor') }}
                                                                        </th>

                                                                        <th>
                                                                            {{ __('translate.Course') }}
                                                                        </th>

                                                                        <th>
                                                                            {{ __('translate.Amount') }}
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    {{-- @foreach ($course_list as $index => $course_item)
                                                                        <tr>
                                                                            <td>{{ ++$index }}</td>
                                                                            <td>{{ html_decode($course_item?->instructor?->name) }}
                                                                            </td>
                                                                            <td>{{ html_decode($course_item?->course?->title) }}
                                                                            </td>
                                                                            <td>{{ currency($course_item->total_amount) }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach --}}
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ed-inv-billing-summary d-flex justify-content-md-end  ">
                                                    <div class="ed-inv-summary-wrapper">
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('translate.Subtotal') }}:</td>
                                                                <td>{{ currency($booking->sub_total_amount) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Discount') }}(-):</td>
                                                                <td>{{ currency($booking->coupon_amount) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="ed-summry-total-sparetor"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('translate.Total') }}:</td>
                                                                <td>{{ currency($booking->total_amount) }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection
