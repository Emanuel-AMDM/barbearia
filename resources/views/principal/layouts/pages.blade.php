@extends('principal.layouts.base')
@section('content')
    @include('principal.includes.header')
    @yield('contentpage')
    @include('principal.includes.footer')
@endsection