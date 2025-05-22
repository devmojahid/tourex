@extends('theme::layouts.app')
@section('front-content')
    {{-- hero section --}}
    @include('theme::components.hero')

    {{-- tour package section --}}
    @include('theme::components.tour-package')

    {{-- why choose section --}}
    @include('theme::components.why-choose')


@endsection
