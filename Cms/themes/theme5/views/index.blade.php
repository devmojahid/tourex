@extends('theme::layouts.app')
@section('front-content')

    {{-- hero section --}}
    @include('theme::components.hero')

    {{-- destination section --}}
    @include('theme::components.destination')

@endsection
