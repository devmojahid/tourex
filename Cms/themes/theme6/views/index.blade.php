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

    {{-- why choose section --}}
    @include('theme::components.why-choose')

    {{-- banner section --}}
    @include('theme::components.banner')

    {{-- destination section --}}
    @include('theme::components.destination')

    {{-- banner 2 section --}}
    @include('theme::components.banner-two')
@endsection
