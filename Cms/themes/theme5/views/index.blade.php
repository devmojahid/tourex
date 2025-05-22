@extends('theme::layouts.app')
@section('front-content')

    {{-- hero section --}}
    @include('theme::components.hero')

    {{-- destination section --}}
    @include('theme::components.destination')

    {{-- banner section --}}
    @include('theme::components.banner')

    {{-- why choose section --}}
    @include('theme::components.why-choose')

    {{-- counter section --}}
    @include('theme::components.counter')

    {{-- tour package section --}}
    @include('theme::components.tour-package')

    {{-- ads section --}}
    @include('theme::components.ads')

@endsection
