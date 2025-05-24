@extends('theme::layouts.app')
@section('front-content')

    {{-- hero section --}}
    @include('theme::components.hero')

    {{-- food category section --}}
    @include('theme::components.food-category')

    {{-- tour package section --}}
    @include('theme::components.tour-package')

@endsection
