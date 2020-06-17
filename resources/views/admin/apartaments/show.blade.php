@extends('layouts.app')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="">
            <h1>{{$apartament->title}}
              @if ($apartament->visible == 0)
                <svg class="bi bi-eye-slash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                  <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                </svg>
              @else
                <svg class="bi bi-eye-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>
              @endif
            </h1>
            <p>{{$apartament->address}}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-6 no-padding">
            <div class="description">
              <h3>Descrizione</h3>
              <p>{!!$apartament->description!!}</p>
            </div>
          </div>
          <div class="col-6 no-padding">
            <img src="{{asset('storage/'  . $apartament->cover_img)}}" alt="{{$apartament->title}}">
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="room-info">
              <div class="row">
                <p>Informazioni stanza</p>
              </div>
              <div class="row" id="info">
                <div> <p>Numero stanze: {{$apartament->rooms_number}}</p>  </div>
                <div> <p>Numero di bagni: {{$apartament->bathrooms_number}}</p>  </div>
                <div> <p>Numero letti: {{$apartament->beds_number}}</p>  </div>
                <div> <p>Dimensioni: {{$apartament->size}}mq</p>  </div>
                <div> <p>Prezzo: {{$apartament->price}}€</p>  </div>
                <div> <p id="latitudine">{{$apartament->latitude}}</p>  </div>
                <div> <p id="longitudine">{{$apartament->longitude}}</p>  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <section class="apartament-map">
             <h5 class="apartament-features-title my-4">Mappa</h5>
             <div id="map" data-long="{{$apartament->longitude}}" data-lat="{{$apartament->latitude}}">
             </div>
             <iframe width="800" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openlinkmap.org/small.php?layers=M&lat={{$apartament->latitude}}&lon={{$apartament->longitude}}&zoom=18" style="border: 1px solid black"></iframe>
          </section>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
