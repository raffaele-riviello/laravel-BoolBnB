<style>
        #indexmap {
          height: 700px;
          width: 500px;
      }
</style>

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
          <h2>Risultati appartamenti per <br> "{{$address}}"</h2>
        <div class="cards">
          @foreach ($apartaments as $apartament)
            <a href="{{route('results.apartament', $apartament->id)}}">
              <div class="card-index">
                <div class="img-card">
                  <img src="{{asset('storage/'  . $apartament->cover_img)}}" class="card-img-top" alt="nome immagine">
                </div>
                <div class="card-body" data-lan="{{$apartament->latitude}}" data-lng="{{$apartament->longitude}}">
                    <h2>{{$apartament->title}}</h2>
                  <p class="card-text">{!!$apartament->description!!}</p>
                  {{-- <div class="caratteristiche">
                    @foreach ($apartament->features as $feature)
                      <span>{{$feature->name}}</span>
                    @endforeach
                  </div> --}}
                  <p>Prezzo: {{$apartament->price}}€</p>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>
      <div class="mappa">
        <div id="indexmap">

        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
            var queryLngLat = [{{request()->get('longitude')}}, {{request()->get('latitude')}}];
            console.log(queryLngLat);
            var indexmap = tt.map({
                container: 'indexmap',
                key: 'gFFCW4AFnFwAIM5ZWPG6Sew8JPYhCY0i',
                style: 'tomtom://vector/1/basic-main',
                center: queryLngLat,
                zoom: 12,
                pitch: 45
            });
            // new tt.Marker().setLngLat(queryLngLat).addTo(indexmap);
            var locations = [];
            $( ".card-body" ).each(function() {
              locations.push($( this ).data('lng'), + $( this ).data('lan'));
            });
            for (var i = 0; i < locations.length; i++) {
                new tt.Marker().setLngLat([locations[i],locations[i+1]]).addTo(indexmap);
            }
    });
    </script>
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
