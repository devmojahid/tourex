@extends('layout_inner_page')

@section('title')
    <title>{{ __('translate.Booking Checkout') }}</title>
@endsection

@section('front-content')
    @include('breadcrumb', ['breadcrumb_title' => __('translate.Booking Checkout')])

    <!-- checkout area -->
    <section class="checkout-area pb-100 pt-125">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tg-checkout-form-wrapper mr-50">
                        <h2 class="tg-checkout-form-title mb-30">{{ __('translate.Billing Details') }}</h2>
                        <div class="row gx-24">
                            <div class="tg-checkout-form-input mb-25">
                                <label>{{ __('translate.Customer name') }}</label>
                                <input id="customer_name" class="input" type="text"
                                    value="{{ auth()->user()->name ?? '' }}" name="customer_name"
                                    placeholder="Customer name">
                            </div>

                            <div class="tg-checkout-form-input mb-25">
                                <label>{{ __('translate.Customer email') }}</label>
                                <input id="customer_email" class="input" type="email"
                                    value="{{ auth()->user()->email ?? '' }}" name="customer_email"
                                    placeholder="Customer email">
                            </div>

                            <div class="tg-checkout-form-input mb-25">
                                <label>{{ __('translate.Customer phone') }}</label>
                                <input id="customer_phone" class="input" type="text"
                                    value="{{ auth()->user()->phone ?? '' }}" name="customer_phone"
                                    placeholder="Customer phone">
                            </div>
                            <div class="tg-checkout-form-input mb-25">
                                <label>{{ __('translate.Customer address') }}</label>
                                <input id="customer_address" class="input" value="{{ auth()->user()->address ?? '' }}"
                                    class="house-number" name="customer_address" type="text"
                                    placeholder="{{ __('translate.House number and Street name') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tg-blog-sidebar top-sticky mb-30">
                        <div class="tg-blog-sidebar-box mb-30">
                            <h2 class="tg-checkout-form-title tg-checkout-form-title-3 mb-15">{{ __('translate.Your Order') }}</h2>
                            <div>
                                {{-- Booking Dates --}}
                                @if (!empty($data['check_in_date']))
                                    <div class="mb-15">
                                        <div class="d-flex justify-content-between mb-5">
                                            <span class="text-muted">{{ __('translate.Check in Date') }}:</span>
                                            <strong>{{ date('d M Y', strtotime($data['check_in_date'])) }}</strong>
                                        </div>
                                        @if (!empty($data['check_out_date']))
                                            <div class="d-flex justify-content-between mb-5">
                                                <span class="text-muted">{{ __('translate.Check out Date') }}:</span>
                                                <strong>{{ date('d M Y', strtotime($data['check_out_date'])) }}</strong>
                                            </div>
                                        @endif
                                        @if (($data['nights'] ?? 1) > 1)
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted">{{ __('translate.Number of Nights') }}:</span>
                                                <strong>{{ $data['nights'] }} {{ __('translate.Nights') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="tg-tour-about-border-doted mb-15"></div>
                                @endif

                                @if ($service->is_per_person)
                                    <div>
                                        <div class="tg-tour-about-tickets-wrap mb-15">
                                            <span class="tg-tour-about-sidebar-title">{{ __('translate.Tickets') }}:</span>

                                            <div class="tg-tour-about-tickets mb-10">
                                                <div class="tg-tour-about-tickets-adult">
                                                    <span>{{ __('translate.Person') }}</span>
                                                    <p class="mb-0">(18+ years)</p>
                                                </div>
                                                <div class="tg-tour-about-tickets-quantity">
                                                    @if (($data['nights'] ?? 1) > 1)
                                                        {{ $data['personCount'] }} x
                                                        {{ currency_price($service->price_per_person) }} x
                                                        {{ $data['nights'] }} {{ __('translate.Nights') }} =
                                                        {{ currency($data['personPrice'], 2) }}
                                                    @else
                                                        {{ $data['personCount'] }} x
                                                        {{ currency_price($service->price_per_person) }} =
                                                        {{ currency($data['personPrice'], 2) }}
                                                    @endif
                                                </div>
                                            </div>

                                            @if (($data['childCount'] ?? 0) > 0)
                                                <div class="tg-tour-about-tickets mb-10">
                                                    <div class="tg-tour-about-tickets-adult">
                                                        <span>{{ __('translate.Children') }}</span>
                                                        <p class="mb-0">(13-17 years)</p>
                                                    </div>
                                                    <div class="tg-tour-about-tickets-quantity">
                                                        @if (($data['nights'] ?? 1) > 1)
                                                            {{ $data['childCount'] }} x
                                                            {{ currency_price($service->child_price) }} x
                                                            {{ $data['nights'] }} {{ __('translate.Nights') }} =
                                                            {{ currency($data['childPrice'], 2) }}
                                                        @else
                                                            {{ $data['childCount'] }} x
                                                            {{ currency_price($service->child_price) }} =
                                                            {{ currency($data['childPrice'], 2) }}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        @if (count($data['extras']) > 0)
                                            <div class="tg-tour-about-extra mb-10">
                                                <span class="tg-tour-about-sidebar-title mb-10 d-inline-block">{{ __('translate.Add Extra') }}:</span>
                                                <div class="tg-filter-list">
                                                    <ul>
                                                        @foreach ($data['extras'] as $key => $extra)
                                                            <li>
                                                                <div class="checkbox d-flex">
                                                                    <label class="tg-label">
                                                                        {{ $extra->name }}
                                                                    </label>
                                                                </div>
                                                                <span class="quantity">{{ currency($extra->price) }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    {{-- Non-per-person: show nightly rate × nights --}}
                                    <div class="tg-tour-about-tickets-wrap mb-15">
                                        <div class="tg-tour-about-tickets mb-10">
                                            <div class="tg-tour-about-tickets-adult">
                                                <span>{{ __('translate.Service Price') }}</span>
                                            </div>
                                            <div class="tg-tour-about-tickets-quantity">
                                                @if (($data['nights'] ?? 1) > 1)
                                                    {{ currency($service->discount_price ?? $service->full_price) }}
                                                    x {{ $data['nights'] }} {{ __('translate.Nights') }} =
                                                    {{ currency($data['total'], 2) }}
                                                @else
                                                    {{ currency($data['total'], 2) }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            <div class="tg-tour-about-border-doted mb-15"></div>
                            <div class="tg-tour-about-coast d-flex align-items-center flex-wrap justify-content-between">
                                <span class="tg-tour-about-sidebar-title d-inline-block">{{ __('translate.Total Cost') }}:</span>
                                <h5 class="total-price">{{ currency($data['total'], 2) }}</h5>
                            </div>
                        </div>
                    </div>
                    @include('tourbooking::front.bookings.payment')
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- checkout area end-->
@endsection

@push('js_section')
    <script>
        $(document).ready(function() {
            function parseCurrency(currencyStr) {
                return parseFloat(currencyStr.replace(/[^0-9.-]+/g, ''));
            }

            function formatCurrency(amount) {
                return '$' + amount.toFixed(2);
            }

            function updatePrices() {
                const subTotal = parseCurrency($('.sub_total span').text());
                const shippingCost = parseCurrency($('.shipping_cost span').text().replace('(+)', '').trim());
                const total = subTotal + shippingCost;
                $('.total span').text(formatCurrency(total));
                $('.stripe_price_here').text(formatCurrency(total));
                $('input[name="subtotal"]').val(subTotal);
                $('input[name="shipping_charge"]').val(shippingCost);
                $('input[name="total"]').val(total);
            }

            $('select[name="shipping_method_id"]').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const priceText = selectedOption.text().split('-')[1].trim();
                const shippingCost = parseCurrency(priceText);
                $('.shipping_cost span').text('(+)' + formatCurrency(shippingCost));
                updatePrices();
            });

            updatePrices();

            $('#customer_name').on('keyup', function() {
                $('.form_customer_name').val($(this).val());
            });
            $('#customer_email').on('change', function() {
                $('.form_customer_email').val($(this).val());
            });
            $('#customer_phone').on('change', function() {
                $('.form_customer_phone').val($(this).val());
            });
            $('#customer_address').on('change', function() {
                $('.form_customer_address').val($(this).val());
            });

        });
    </script>
@endpush
