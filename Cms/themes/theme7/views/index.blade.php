@extends('theme::layouts.app')
@section('front-content')

    {{-- hero section --}}
    @include('theme::components.hero')

    {{-- food category section --}}
    @include('theme::components.food-category')

    {{-- tour package section --}}
    @include('theme::components.tour-package')

    {{-- banner section --}}
    @include('theme::components.banner')

    {{-- counter section --}}
    @include('theme::components.counter')

    {{-- why choose section --}}
    @include('theme::components.why-choose')

    {{-- destination section --}}
    @include('theme::components.destination')

    {{-- testimonial section --}}
    @include('theme::components.testimonial')

    {{-- partner section --}}
    @include('theme::components.partner')

    {{-- blog section --}}
    @include('theme::components.blog')

    {{-- cta section --}}
    @include('theme::components.cta')

@endsection
