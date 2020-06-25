@extends('layouts.app')

@section('style')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.headerBassoFisso')
@endsection

@section('main')
  <div class="container">
    <div class="row index-guests">
      <div class="cards-outer">
          <h2>Risultati appartamenti per "{{$address}}"</h2>
        <div class="cards">
          @foreach ($apartaments as $apartament)
            <a href="{{route('results.apartament', $apartament->id)}}">
              <div class="card-index">
                <div class="img-card">
                  <img src="{{asset('storage/'  . $apartament->cover_img)}}" class="card-img-top" alt="nome immagine">
                </div>
                <div class="card-body">
                    <h2>{{$apartament->title}}</h2>
                  <p class="card-text">{!!$apartament->description!!}</p>
                  <div class="caratteristiche">
                    @foreach ($apartament->features as $feature)
                      <span>{{$feature->name}}</span>
                    @endforeach
                  </div>
                  <p>Prezzo: {{$apartament->price}}€</p>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>
      <div class="mappa">
        <iframe width="450" height="720" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openlinkmap.org/small.php?layers=M&lat=4178236&lon=12342500&zoom=1" style="border: 1px solid black"></iframe>
      </div>
    </div>
  </div>
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
