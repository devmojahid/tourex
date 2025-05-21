@extends('theme::layouts.app')
@section('front-content')
    {{-- hero section --}}
    @include('theme::components.hero')

    {{-- booking form section --}}
    @include('theme::components.booking-form')

    {{-- partner section --}}
    @include('theme::components.partner')

    {{-- destination section --}}
    @include('theme::components.destination')

    {{-- banner section --}}
    @include('theme::components.banner')

    {{-- package section --}}
    @include('theme::components.package')

    {{-- why choose section --}}
    @include('theme::components.why-choose')

    {{-- counter section --}}
    @include('theme::components.counter')

    {{-- testimonial section --}}
    @include('theme::components.testimonial')

    {{-- blog section --}}
    @include('theme::components.blog')

    {{-- cta section --}}
    @include('theme::components.cta')
@endsection
