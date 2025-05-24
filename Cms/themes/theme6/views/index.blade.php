@extends('theme::layouts.app')
@section('front-content')

    {{-- booking section --}}
    @include('theme::components.booking-form')

    {{-- hero section --}}
    @include('theme::components.hero')
@endsection
