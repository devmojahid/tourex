@extends('theme::layouts.app')
@section('front-content')

    {{-- booking section --}}
    @include('theme::components.booking-form')

    {{-- hero section --}}
    @include('theme::components.hero')

    {{-- ads section --}}
    @include('theme::components.ads')

    {{-- tour package section --}}
    @include('theme::components.tour-package')
@endsection
