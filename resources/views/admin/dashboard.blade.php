@php
  use Carbon\Carbon;
  use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.app')

@section('bootstrap')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.headerBasso')
@endsection

@section('main')
<div class="container dashboard">
  <div class="card">
    <div class="upper-section">
      <img src="{{asset('/img/dashboard-back.jpg')}}" alt="">
      <div class="mini-header">
        <div class="left"> <p>Benvenuto {{Auth::user()->name}}</p> </div>
        <div class="right"> <p>{{Carbon::now()}}</p> </div>
      </div>
      <div class="statistics">

      </div>
    </div>

    <div class="lower-section">
      <a href="{{route('admin.apartaments.index')}}"><button class="btn "type="button" name="button">I tuoi appartamenti</button></a>
      <a href="{{route('admin.apartaments.create')}}"><button class="btn "type="button" name="button">Aggiungi appartamento</button></a>
      <a href="{{route('messages.index')}}"><button class="btn "type="button" name="button">Messaggi ricevuti</button></a>
    </div>
      {{-- <div class="card-header">Dashboard</div>

      <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          You are logged in!

          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.apartaments.create')}}">Aggiungi Appartamento</a>
            </li>
          </ul>
      </div> --}}
  </div>
</div>
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
