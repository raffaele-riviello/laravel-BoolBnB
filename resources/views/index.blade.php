@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <h2>Risultati appartamenti per "{{$address}}"</h2>
      <div class="col-12 cards">
        @foreach ($apartaments as $apartament)
          <a href="{{route('results.apartament', $apartament->id)}}">
            <div class="card">
              <img src="{{asset('storage/'  . $apartament->cover_img)}}" class="card-img-top" alt="nome immagine">
              <div class="card-body">
                <p class="card-text">{!!$apartament->description!!}</p>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endsection
