@extends('layouts.app')

@section('style')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('title')
    Home
@endsection


@section('header')
  @include('partials.header')
@endsection

@section('main')
  <div class="container">
        <div class="row">
          <h3>Comunicaci dove vorresti andare</h3>
        </div>
        <div class="row half-padding">
          <form class="form-inline" action="{{route('results')}}">
            <div class="search-bar">
              <div class="section">
                <input name="address" type="search" placeholder="Inserisci una località" aria-label="Search">
              </div>
              {{-- <div class="section">
                <input name="address" type="search" placeholder="Inserisci un indirizzo" aria-label="Search">
              </div>
              <div class="section">
                <input name="zipcode" type="search" placeholder="Inserisci un codice postale" aria-label="Search">
              </div> --}}
              <div class="section">
                <button type="submit">Cerca</button>
              </div>
            </div>
          </form>
        </div>
        <div class="row">
          <h2>Appartamenti in evidenza</h2>
        </div>
        <div class="row">
          <!-- navigazione owl -->
          <!-- <i class="fa fa-angle-left owl-prev" aria-hidden="true"></i> -->
          <!-- <i class="fa fa-angle-right owl-next" aria-hidden="true"></i> -->
          <!-- navigazione owl -->
          <div class="owl-carousel">
            <div class="card">Appartamento</div>
            <div class="card">Appartamento</div>
            <div class="card">Appartamento</div>
            <div class="card">Appartamento</div>
            <div class="card">Appartamento</div>
            <div class="card">Appartamento</div>
            <div class="card">Appartamento</div>
            <div class="card">Appartamento</div>
          </div>
        </div>
      </div>
    {{-- <form class="form-inline" action="{{route('results')}}">
      <input name="address" class="form-control mr-sm-2" type="search" placeholder="Dove vuoi andare?" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
    </form> --}}
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
