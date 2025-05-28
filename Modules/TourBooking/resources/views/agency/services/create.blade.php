@extends('agency.master_layout')
@section('title')
    <title>{{ __('translate.Create Service') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create Service') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Tour Booking') }} >> {{ __('translate.Create Service') }}</p>
@endsection

@push('style_section')
    <link rel="stylesheet" href="{{ asset('global/select2/select2.min.css') }}">
    <style>
        /* Currency Input Field Styling */
        .crancy__item-form--currency {
            position: relative;
            display: flex;
            align-items: center;
        }

        .crancy__item-form--currency .crancy__item-input {
            width: 100%;
            padding-right: 40px;
            /* Add space for the currency icon */
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px 40px 10px 12px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .crancy__item-form--currency .crancy__item-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .crancy__currency-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            /* Prevents icon from interfering with input clicks */
            z-index: 2;
        }

        .crancy__currency-icon span {
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }

        /* Optional: Style for better visual hierarchy */
        .crancy__item-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .mg-top-form-20 {
            margin-top: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .crancy__item-form--currency .crancy__item-input {
                padding-right: 35px;
            }

            .crancy__currency-icon {
                right: 10px;
            }

            .crancy__currency-icon span {
                font-size: 13px;
            }
        }
    </style>
@endpush



@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form action="{{ route('agency.tourbooking.services.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">
                                                    {{ __('translate.Basic Information') }}</h4>
                                                <a href="{{ route('agency.tourbooking.services.index') }}"
                                                    class="crancy-btn"><i class="fa fa-list"></i>
                                                    {{ __('translate.Service List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Title') }}
                                                            *</label>
                                                        <input class="crancy__item-input" type="text" name="title"
                                                            id="title" value="{{ old('title') }}" required>
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Slug') }}</label>
                                                        <input class="crancy__item-input" type="text" name="slug"
                                                            id="slug" value="{{ old('slug') }}">
                                                        @error('slug')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Service Type') }}
                                                            *</label>
                                                        <select class="crancy__item-input" name="service_type_id" required>
                                                            <option value="">{{ __('translate.Select Type') }}
                                                            </option>
                                                            @foreach ($serviceTypes as $type)
                                                                <option value="{{ $type->id }}"
                                                                    {{ old('service_type_id') == $type->id ? 'selected' : '' }}>
                                                                    {{ $type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('service_type_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Location') }}</label>
                                                        <input class="crancy__item-input" type="text" name="location"
                                                            value="{{ old('location') }}">
                                                        @error('location')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Duration') }}</label>
                                                        <input class="crancy__item-input" type="text" name="duration"
                                                            value="{{ old('duration') }}"
                                                            placeholder="e.g. 3 hours, 2 days">
                                                        @error('duration')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Group Size') }}</label>
                                                        <input class="crancy__item-input" type="text" name="group_size"
                                                            value="{{ old('group_size') }}"
                                                            placeholder="e.g. Up to 10 people">
                                                        @error('group_size')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Short Description') }}</label>
                                                        <textarea class="crancy__item-input summernote" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                                        @error('short_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Description') }}</label>
                                                        <textarea class="crancy__item-input summernote" name="description" rows="6">{{ old('description') }}</textarea>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Status') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="status" type="checkbox" checked
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Pricing Details') }}
                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Price Per Person') }}</label>
                                                        <div class="crancy__item-form--currency">
                                                            <input class="crancy__item-input" type="number"
                                                                step="0.01" name="price_per_person"
                                                                value="{{ old('price_per_person') }}">
                                                            <div class="crancy__currency-icon">
                                                                <span>{{ config('settings.currency_icon', '$') }}</span>
                                                            </div>
                                                        </div>
                                                        @error('price_per_person')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Full Price') }}</label>
                                                        <div class="crancy__item-form--currency">
                                                            <input class="crancy__item-input" type="number"
                                                                step="0.01" name="full_price"
                                                                value="{{ old('full_price') }}">
                                                            <div class="crancy__currency-icon">
                                                                <span>{{ config('settings.currency_icon', '$') }}</span>
                                                            </div>
                                                        </div>
                                                        @error('full_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Discount Price') }}</label>
                                                        <div class="crancy__item-form--currency">
                                                            <input class="crancy__item-input" type="number"
                                                                step="0.01" name="discount_price"
                                                                value="{{ old('discount_price') }}">
                                                            <div class="crancy__currency-icon">
                                                                <span>{{ config('settings.currency_icon', '$') }}</span>
                                                            </div>
                                                        </div>
                                                        @error('discount_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Child Price') }}</label>
                                                        <div class="crancy__item-form--currency">
                                                            <input class="crancy__item-input" type="number"
                                                                step="0.01" name="child_price"
                                                                value="{{ old('child_price') }}">
                                                            <div class="crancy__currency-icon">
                                                                <span>{{ config('settings.currency_icon', '$') }}</span>
                                                            </div>
                                                        </div>
                                                        @error('child_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Infant Price') }}</label>
                                                        <div class="crancy__item-form--currency">
                                                            <input class="crancy__item-input" type="number"
                                                                step="0.01" name="infant_price"
                                                                value="{{ old('infant_price') }}">
                                                            <div class="crancy__currency-icon">
                                                                <span>{{ config('settings.currency_icon', '$') }}</span>
                                                            </div>
                                                        </div>
                                                        @error('infant_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Security Deposit') }}</label>
                                                        <div class="crancy__item-form--currency">
                                                            <input class="crancy__item-input" type="number"
                                                                step="0.01" name="security_deposit"
                                                                value="{{ old('security_deposit') }}">
                                                            <div class="crancy__currency-icon">
                                                                <span>{{ config('settings.currency_icon', '$') }}</span>
                                                            </div>
                                                        </div>
                                                        @error('security_deposit')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Deposit Required') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="deposit_required" type="checkbox"
                                                                    {{ old('deposit_required') ? 'checked' : '' }}
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Deposit Percentage') }}</label>
                                                        <div class="crancy__item-form--currency">
                                                            <input class="crancy__item-input" type="number"
                                                                min="0" max="100" name="deposit_percentage"
                                                                value="{{ old('deposit_percentage') }}">
                                                            <div class="crancy__currency-icon">
                                                                <span>%</span>
                                                            </div>
                                                        </div>
                                                        @error('deposit_percentage')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Additional Information') }}</h4>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Check-in Time') }}</label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="check_in_time" value="{{ old('check_in_time') }}"
                                                            placeholder="e.g. 14:00">
                                                        @error('check_in_time')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Check-out Time') }}</label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="check_out_time" value="{{ old('check_out_time') }}"
                                                            placeholder="e.g. 10:00">
                                                        @error('check_out_time')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Ticket') }}</label>
                                                        <input class="crancy__item-input" type="text" name="ticket"
                                                            value="{{ old('ticket') }}"
                                                            placeholder="e.g. Mobile Voucher or Printed Ticket">
                                                        @error('ticket')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Video URL') }}</label>
                                                        <input class="crancy__item-input" type="url" name="video_url"
                                                            value="{{ old('video_url') }}"
                                                            placeholder="YouTube or Vimeo URL">
                                                        @error('video_url')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Languages') }}</label>
                                                        <select class="crancy__item-input select2" name="languages[]"
                                                            multiple>
                                                            <option value="English"
                                                                {{ old('languages') && in_array('English', old('languages')) ? 'selected' : '' }}>
                                                                English</option>
                                                            <option value="Spanish"
                                                                {{ old('languages') && in_array('Spanish', old('languages')) ? 'selected' : '' }}>
                                                                Spanish</option>
                                                            <option value="French"
                                                                {{ old('languages') && in_array('French', old('languages')) ? 'selected' : '' }}>
                                                                French</option>
                                                            <option value="German"
                                                                {{ old('languages') && in_array('German', old('languages')) ? 'selected' : '' }}>
                                                                German</option>
                                                            <option value="Italian"
                                                                {{ old('languages') && in_array('Italian', old('languages')) ? 'selected' : '' }}>
                                                                Italian</option>
                                                            <option value="Chinese"
                                                                {{ old('languages') && in_array('Chinese', old('languages')) ? 'selected' : '' }}>
                                                                Chinese</option>
                                                            <option value="Japanese"
                                                                {{ old('languages') && in_array('Japanese', old('languages')) ? 'selected' : '' }}>
                                                                Japanese</option>
                                                            <option value="Arabic"
                                                                {{ old('languages') && in_array('Arabic', old('languages')) ? 'selected' : '' }}>
                                                                Arabic</option>
                                                            <option value="Russian"
                                                                {{ old('languages') && in_array('Russian', old('languages')) ? 'selected' : '' }}>
                                                                Russian</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Amenities') }}</label>
                                                        <select class="crancy__item-input select2" name="amenities[]"
                                                            multiple>
                                                            <option value="Free WiFi"
                                                                {{ old('amenities') && in_array('Free WiFi', old('amenities')) ? 'selected' : '' }}>
                                                                Free WiFi</option>
                                                            <option value="Air Conditioning"
                                                                {{ old('amenities') && in_array('Air Conditioning', old('amenities')) ? 'selected' : '' }}>
                                                                Air Conditioning</option>
                                                            <option value="Parking"
                                                                {{ old('amenities') && in_array('Parking', old('amenities')) ? 'selected' : '' }}>
                                                                Parking</option>
                                                            <option value="Restaurant"
                                                                {{ old('amenities') && in_array('Restaurant', old('amenities')) ? 'selected' : '' }}>
                                                                Restaurant</option>
                                                            <option value="Bar"
                                                                {{ old('amenities') && in_array('Bar', old('amenities')) ? 'selected' : '' }}>
                                                                Bar</option>
                                                            <option value="Swimming Pool"
                                                                {{ old('amenities') && in_array('Swimming Pool', old('amenities')) ? 'selected' : '' }}>
                                                                Swimming Pool</option>
                                                            <option value="Spa"
                                                                {{ old('amenities') && in_array('Spa', old('amenities')) ? 'selected' : '' }}>
                                                                Spa</option>
                                                            <option value="Fitness Center"
                                                                {{ old('amenities') && in_array('Fitness Center', old('amenities')) ? 'selected' : '' }}>
                                                                Fitness Center</option>
                                                            <option value="Family Friendly"
                                                                {{ old('amenities') && in_array('Family Friendly', old('amenities')) ? 'selected' : '' }}>
                                                                Family Friendly</option>
                                                            <option value="Pet Friendly"
                                                                {{ old('amenities') && in_array('Pet Friendly', old('amenities')) ? 'selected' : '' }}>
                                                                Pet Friendly</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.What is included') }}</label>
                                                        <textarea name="included" rows="30" placeholder="One item per line">{{ old('included') }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.What is excluded') }}</label>
                                                        <textarea name="excluded" rows="30" placeholder="One item per line">{{ old('excluded') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">
                                                {{ __('translate.Contact Information') }}</h4>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Address') }}</label>
                                                        <textarea class="" name="address" rows="40">{{ old('address') }}</textarea>
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Map Coordinates') }}</label>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input class="crancy__item-input" type="text"
                                                                    name="latitude" value="{{ old('latitude') }}"
                                                                    placeholder="Latitude">
                                                                @error('latitude')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-6">
                                                                <input class="crancy__item-input" type="text"
                                                                    name="longitude" value="{{ old('longitude') }}"
                                                                    placeholder="Longitude">
                                                                @error('longitude')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Email') }}</label>
                                                        <input class="crancy__item-input" type="email" name="email"
                                                            value="{{ old('email') }}">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Phone') }}</label>
                                                        <input class="crancy__item-input" type="text" name="phone"
                                                            value="{{ old('phone') }}">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Website') }}</label>
                                                        <input class="crancy__item-input" type="url" name="website"
                                                            value="{{ old('website') }}">
                                                        @error('website')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.SEO Information') }}
                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.SEO Title') }}</label>
                                                        <input class="crancy__item-input" type="text" name="seo_title"
                                                            value="{{ old('seo_title') }}">
                                                        @error('seo_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.SEO Description') }}</label>
                                                        <textarea class="crancy__item-input summernote" name="seo_description" rows="3">{{ old('seo_description') }}</textarea>
                                                        @error('seo_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.SEO Keywords') }}</label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="seo_keywords" value="{{ old('seo_keywords') }}"
                                                            placeholder="Comma separated keywords">
                                                        @error('seo_keywords')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Display Options') }}
                                            </h4>

                                            <div class="row mg-top-30">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Featured') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_featured" type="checkbox"
                                                                    {{ old('is_featured') ? 'checked' : '' }}
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Popular') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_popular" type="checkbox"
                                                                    {{ old('is_popular') ? 'checked' : '' }}
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label
                                                            class="crancy__item-label">{{ __('translate.Show on Homepage') }}</label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="show_on_homepage" type="checkbox"
                                                                    {{ old('show_on_homepage') ? 'checked' : '' }}
                                                                    value="1">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mg-top-30">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i>
                                            {{ __('translate.After creating the service, you can upload images and videos from the Media Gallery section.') }}
                                        </div>
                                        <button class="crancy-btn"
                                            type="submit">{{ __('translate.Create Service') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js_section')
    <script src="{{ asset('global/select2/select2.min.js') }}"></script>
    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {
                $("#title").on("keyup", function(e) {
                    let inputValue = $(this).val();
                    let slug = inputValue.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
                    $("#slug").val(slug);
                });

                $('.select2').select2({
                    tags: true,
                    tokenSeparators: [',', ' ']
                });

                tinymce.init({
                    selector: '.summernote',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });
            });
        })(jQuery);
    </script>
@endpush
