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

@endsection
