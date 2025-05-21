@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Booking Details') }} #{{ $booking->booking_number }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Booking Details') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Bookings') }} >> {{ __('translate.Details') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Booking') }} #{{ $booking->booking_number }}</h4>
                                            <div>
                                                <a href="{{ route('admin.tourbooking.bookings.index') }}" class="crancy-btn"><i class="fa fa-arrow-left"></i> {{ __('translate.Back to List') }}</a>
                                                @if($booking->status == 'pending')
                                                <a href="#" class="crancy-btn crancy-btn__success" data-bs-toggle="modal" data-bs-target="#confirmModal">
                                                    <i class="fa fa-check"></i> {{ __('translate.Confirm Booking') }}
                                                </a>
                                                <a href="#" class="crancy-btn crancy-btn__danger" data-bs-toggle="modal" data-bs-target="#cancelModal">
                                                    <i class="fa fa-times"></i> {{ __('translate.Cancel Booking') }}
                                                </a>
                                                @endif
                                                <a href="{{ route('admin.tourbooking.bookings.invoice', $booking->id) }}" class="crancy-btn" target="_blank">
                                                    <i class="fa fa-file-invoice"></i> {{ __('translate.View Invoice') }}
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><i class="fa fa-info-circle"></i> {{ __('translate.Booking Information') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th width="40%">{{ __('translate.Booking Number') }}:</th>
                                                                <td><strong>{{ $booking->booking_number }}</strong></td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Booking Date') }}:</th>
                                                                <td>{{ date('d M Y, h:i A', strtotime($booking->created_at)) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Status') }}:</th>
                                                                <td>
                                                                    @if($booking->status == 'pending')
                                                                        <span class="badge bg-warning">{{ __('translate.Pending') }}</span>
                                                                    @elseif($booking->status == 'confirmed')
                                                                        <span class="badge bg-success">{{ __('translate.Confirmed') }}</span>
                                                                    @elseif($booking->status == 'completed')
                                                                        <span class="badge bg-info">{{ __('translate.Completed') }}</span>
                                                                    @elseif($booking->status == 'cancelled')
                                                                        <span class="badge bg-danger">{{ __('translate.Cancelled') }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Payment Status') }}:</th>
                                                                <td>
                                                                    @if($booking->payment_status == 'paid')
                                                                        <span class="badge bg-success">{{ __('translate.Paid') }}</span>
                                                                    @elseif($booking->payment_status == 'partial')
                                                                        <span class="badge bg-warning">{{ __('translate.Partial') }}</span>
                                                                    @elseif($booking->payment_status == 'unpaid')
                                                                        <span class="badge bg-danger">{{ __('translate.Unpaid') }}</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Payment Method') }}:</th>
                                                                <td>{{ ucfirst($booking->payment_method) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Transaction ID') }}:</th>
                                                                <td>{{ $booking->transaction_id ?? 'N/A' }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><i class="fa fa-user"></i> {{ __('translate.Customer Information') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th width="40%">{{ __('translate.Name') }}:</th>
                                                                <td>{{ $booking->customer_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Email') }}:</th>
                                                                <td>{{ $booking->customer_email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Phone') }}:</th>
                                                                <td>{{ $booking->customer_phone }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Address') }}:</th>
                                                                <td>{{ $booking->customer_address ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.City') }}:</th>
                                                                <td>{{ $booking->customer_city ?? 'N/A' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('translate.Country') }}:</th>
                                                                <td>{{ $booking->customer_country ?? 'N/A' }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><i class="fa fa-calendar-check"></i> {{ __('translate.Tour Details') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row mb-4">
                                                            <div class="col-md-8">
                                                                <h5>{{ $booking->service->translation->title ?? $booking->service->title }}</h5>
                                                                <p class="text-muted">
                                                                    <i class="fa fa-map-marker-alt"></i> {{ $booking->service->location ?? 'N/A' }}
                                                                </p>
                                                                <p>
                                                                    <strong>{{ __('translate.Tour Type') }}:</strong> 
                                                                    {{ $booking->service->serviceType->translation->name ?? $booking->service->serviceType->name }}
                                                                </p>
                                                                <p>
                                                                    <strong>{{ __('translate.Duration') }}:</strong> 
                                                                    {{ $booking->service->duration ?? 'N/A' }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4 text-end">
                                                                @if($booking->service->thumbnail)
                                                                    <img src="{{ asset($booking->service->thumbnail) }}" alt="{{ $booking->service->title }}" class="img-fluid rounded" style="max-height: 120px;">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <table class="table table-borderless">
                                                                    <tr>
                                                                        <th width="40%">{{ __('translate.Start Date') }}:</th>
                                                                        <td><strong>{{ date('d M Y', strtotime($booking->start_date)) }}</strong></td>
                                                                    </tr>
                                                                    @if($booking->end_date)
                                                                    <tr>
                                                                        <th>{{ __('translate.End Date') }}:</th>
                                                                        <td>{{ date('d M Y', strtotime($booking->end_date)) }}</td>
                                                                    </tr>
                                                                    @endif
                                                                    <tr>
                                                                        <th>{{ __('translate.Adults') }}:</th>
                                                                        <td>{{ $booking->adults }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{ __('translate.Children') }}:</th>
                                                                        <td>{{ $booking->children ?? 0 }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>{{ __('translate.Infants') }}:</th>
                                                                        <td>{{ $booking->infants ?? 0 }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <table class="table table-borderless">
                                                                    <tr>
                                                                        <th width="40%">{{ __('translate.Special Requirements') }}:</th>
                                                                        <td>{{ $booking->special_requirements ?? 'N/A' }}</td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><i class="fa fa-dollar-sign"></i> {{ __('translate.Price Details') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ __('translate.Description') }}</th>
                                                                    <th class="text-right">{{ __('translate.Amount') }}</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{ __('translate.Base Price') }} x {{ $booking->adults }} {{ __('translate.Adults') }}</td>
                                                                    <td class="text-right">{{ currencyConverter($booking->service->price * $booking->adults) }}</td>
                                                                </tr>
                                                                
                                                                @if($booking->children > 0 && $booking->service->child_price > 0)
                                                                <tr>
                                                                    <td>{{ __('translate.Child Price') }} x {{ $booking->children }} {{ __('translate.Children') }}</td>
                                                                    <td class="text-right">{{ currencyConverter($booking->service->child_price * $booking->children) }}</td>
                                                                </tr>
                                                                @endif
                                                                
                                                                @if($booking->infants > 0 && $booking->service->infant_price > 0)
                                                                <tr>
                                                                    <td>{{ __('translate.Infant Price') }} x {{ $booking->infants }} {{ __('translate.Infants') }}</td>
                                                                    <td class="text-right">{{ currencyConverter($booking->service->infant_price * $booking->infants) }}</td>
                                                                </tr>
                                                                @endif
                                                                
                                                                @if(isset($booking->extra_charges) && count(json_decode($booking->extra_charges, true)) > 0)
                                                                    @foreach(json_decode($booking->extra_charges, true) as $charge)
                                                                    <tr>
                                                                        <td>{{ $charge['name'] }}</td>
                                                                        <td class="text-right">{{ currencyConverter($charge['price']) }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                @endif
                                                                
                                                                @if($booking->discount > 0)
                                                                <tr>
                                                                    <td>{{ __('translate.Discount') }}</td>
                                                                    <td class="text-right">-{{ currencyConverter($booking->discount) }}</td>
                                                                </tr>
                                                                @endif
                                                                
                                                                @if($booking->tax > 0)
                                                                <tr>
                                                                    <td>{{ __('translate.Tax') }} ({{ $booking->tax_percentage }}%)</td>
                                                                    <td class="text-right">{{ currencyConverter($booking->tax) }}</td>
                                                                </tr>
                                                                @endif
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>{{ __('translate.Grand Total') }}</th>
                                                                    <th class="text-right">{{ currencyConverter($booking->total_amount) }}</th>
                                                                </tr>
                                                                @if($booking->payment_status != 'unpaid')
                                                                <tr>
                                                                    <th>{{ __('translate.Paid Amount') }}</th>
                                                                    <th class="text-right">{{ currencyConverter($booking->paid_amount) }}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th>{{ __('translate.Due Amount') }}</th>
                                                                    <th class="text-right">{{ currencyConverter($booking->total_amount - $booking->paid_amount) }}</th>
                                                                </tr>
                                                                @endif
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($booking->travelers && count(json_decode($booking->travelers, true)) > 0)
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="mb-0"><i class="fa fa-users"></i> {{ __('translate.Traveler Details') }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>{{ __('translate.Name') }}</th>
                                                                        <th>{{ __('translate.Type') }}</th>
                                                                        <th>{{ __('translate.Age') }}</th>
                                                                        <th>{{ __('translate.Passport/ID') }}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach(json_decode($booking->travelers, true) as $index => $traveler)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $traveler['name'] }}</td>
                                                                        <td>
                                                                            @if($traveler['type'] == 'adult')
                                                                                {{ __('translate.Adult') }}
                                                                            @elseif($traveler['type'] == 'child')
                                                                                {{ __('translate.Child') }}
                                                                            @elseif($traveler['type'] == 'infant')
                                                                                {{ __('translate.Infant') }}
                                                                            @endif
                                                                        </td>
                                                                        <td>{{ $traveler['age'] ?? 'N/A' }}</td>
                                                                        <td>{{ $traveler['document_number'] ?? 'N/A' }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Admin Notes Section -->
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <h5 class="mb-0"><i class="fa fa-sticky-note"></i> {{ __('translate.Admin Notes') }}</h5>
                                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addNoteModal">
                                                            <i class="fa fa-plus"></i> {{ __('translate.Add Note') }}
                                                        </button>
                                                    </div>
                                                    <div class="card-body">
                                                        @if($booking->admin_notes && count(json_decode($booking->admin_notes, true)) > 0)
                                                            @foreach(json_decode($booking->admin_notes, true) as $note)
                                                            <div class="note-item mb-3 p-3 border rounded">
                                                                <div class="d-flex justify-content-between">
                                                                    <strong>{{ $note['admin_name'] }}</strong>
                                                                    <small>{{ date('d M Y, h:i A', strtotime($note['date'])) }}</small>
                                                                </div>
                                                                <p class="mt-2 mb-0">{{ $note['note'] }}</p>
                                                            </div>
                                                            @endforeach
                                                        @else
                                                            <p class="text-center">{{ __('translate.No admin notes found') }}</p>
                                                        @endif
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
            </div>
        </div>
    </section>

    <!-- Confirm Booking Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">{{ __('translate.Confirm Booking') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.tourbooking.bookings.confirm', $booking->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>{{ __('translate.Are you sure you want to confirm this booking?') }}</p>
                        <div class="form-group">
                            <label>{{ __('translate.Confirmation Message') }} ({{ __('translate.Optional') }})</label>
                            <textarea class="form-control" name="confirmation_message" rows="3" placeholder="{{ __('translate.Enter message to send to customer') }}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="crancy-btn crancy-btn__default" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                        <button type="submit" class="crancy-btn crancy-btn__success">{{ __('translate.Confirm Booking') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Cancel Booking Modal -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">{{ __('translate.Cancel Booking') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.tourbooking.bookings.cancel', $booking->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>{{ __('translate.Are you sure you want to cancel this booking?') }}</p>
                        <div class="form-group">
                            <label>{{ __('translate.Cancellation Reason') }} *</label>
                            <textarea class="form-control" name="cancellation_reason" rows="3" required placeholder="{{ __('translate.Enter reason for cancellation') }}"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="refund" id="refundCheck">
                                <label class="form-check-label" for="refundCheck">
                                    {{ __('translate.Process Refund') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group mt-3 refund-amount-container d-none">
                            <label>{{ __('translate.Refund Amount') }}</label>
                            <input type="number" class="form-control" name="refund_amount" step="0.01" min="0" max="{{ $booking->paid_amount }}" value="{{ $booking->paid_amount }}">
                            <small class="text-muted">{{ __('translate.Maximum refund amount is') }} {{ currencyConverter($booking->paid_amount) }}</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="crancy-btn crancy-btn__default" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="crancy-btn crancy-btn__danger">{{ __('translate.Cancel Booking') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Note Modal -->
    <div class="modal fade" id="addNoteModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNoteModalLabel">{{ __('translate.Add Admin Note') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.tourbooking.bookings.add-note', $booking->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('translate.Note') }} *</label>
                            <textarea class="form-control" name="note" rows="3" required placeholder="{{ __('translate.Enter your note') }}"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="crancy-btn crancy-btn__default" data-bs-dismiss="modal">{{ __('translate.Cancel') }}</button>
                        <button type="submit" class="crancy-btn">{{ __('translate.Add Note') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js_section')
<script>
    (function($) {
        "use strict"
        $(document).ready(function () {
            // Show/hide refund amount based on checkbox
            $('#refundCheck').on('change', function() {
                if($(this).is(':checked')) {
                    $('.refund-amount-container').removeClass('d-none');
                } else {
                    $('.refund-amount-container').addClass('d-none');
                }
            });
        });
    })(jQuery);
</script>
@endpush 