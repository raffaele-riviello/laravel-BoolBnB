@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="">
            <h1>{{$apartament->title}}</h1>
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
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <section class="apartament-map">
               <h5 class="apartament-features-title my-4">Mappa</h5>
               <div id="map" data-long="{{$apartament->longitude}}" data-lat="{{$apartament->latitude}}">
               </div>
               <iframe width="450" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.openlinkmap.org/small.php?layers=M&lat={{$apartament->latitude}}&lon={{$apartament->longitude}}&zoom=18" style="border: 1px solid black"></iframe>
            </section>
          </div>
          <div class="col-6">
            <h2>Contattami per questo appartamento</h2>
            <div class="message-form">
              <form action="{{route('messages.store')}}" method="POST">
                @method('POST')
                @csrf
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Mario Rossi">
                </div>
                <div class="form-group">
                  <label for="email">Indirizzo email</label>
                  <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="form-group">
                  <label for="message">Messaggio</label>
                  <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                </div>
                <button class="btn btn-primary" type="submit" name="button">Invia</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
