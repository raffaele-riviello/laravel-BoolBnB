@extends('layouts.app')

@section('style')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('header')
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
          {{-- <a class="navbar-brand" href="{{ url('/home') }}">
              Home
          </a> --}}
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <a class="navbar-brand">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png" width="150" height="50" class="d-inline-block align-top" alt="">
              </a>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
  </nav>
@endsection

@section('main')
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
                <div class="form-group">
                    <input name="apartamentid" type="hidden" class="form-control" id="apartamentid" value="{{$apartament->id}}">
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
