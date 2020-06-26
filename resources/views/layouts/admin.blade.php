@extends('layouts.app')

@section('bootstrap')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.headerBasso')
@endsection

@section('main')
      @yield('login')
      @yield('register')
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
