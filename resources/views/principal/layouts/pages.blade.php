@extends('principal.layouts.base')
@section('content')
    @include('principal.includes.header')

    <main class="page-content">
        @yield('contentpage')
    </main>

    @include('principal.includes.footer')
@endsection