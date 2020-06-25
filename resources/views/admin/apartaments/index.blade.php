@extends('layouts.app')

@section('bootstrap')
  {{-- Bootstrap --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
              <a href="{{route('home')}}" class="navbar-brand">
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
          <ul class="nav justify-content-center">
            <li class="nav-item">
               <a class="nav-link active" href="{{route('dashboard')}}">Torna alla dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.apartaments.create')}}">Aggiungi Appartamento</a>
            </li>
          </ul>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Titolo</th>
                <th>Dimensione</th>
                <th>Numero di stanze</th>
                <th>Prezzo</th>
                <th>Indirizzo</th>
                <th>Visible</th>
                <th colspan="3">Azioni</th>
                <th>Sponsorizza</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($apartaments as $apartament)
                  <tr>
                    <td>{{$apartament->id}}</td>
                    <td>{{$apartament->title}}</td>
                    <td>{{$apartament->size}}</td>
                    <td>{{$apartament->rooms_number}}</td>
                    {{-- <td>{{$apartament->beds_number}}</td> --}}
                    <td>{{$apartament->price}}</td>
                    <td>{{$apartament->address}}</td>
                    <td>{{$apartament->visible}}</td>
                    <td><a class="btn btn-primary" href="{{route('admin.apartaments.show', $apartament->id)}}">Visualizza</a></td>
                    <td><a class="btn btn-secondary" href="{{route('admin.apartaments.edit', $apartament->id)}}">Modifica</a></td>
                    <td>
                      @if(Auth::id() == $apartament->user_id)
                      <form action="{{route('admin.apartaments.destroy', $apartament->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Elimina">
                      </form>
                      @endif
                    </td>
                    {{-- parte sponsorizzazione --}}
                    <td>
                      @if(!(\App\Cart::where(['apartament_id' => $apartament->id])->first()))
                        <a class="btn btn-success" href="{{route('admin.cart.apartament', $apartament->id)}}">Sponsorizza</a>
                      @else
                        {{-- <input disabled class="btn btn-primary" value="Sponsorizzato"> --}}
                        Sponsorizzato
                      @endif
                    </td>
                    {{-- parte sponsorizzazione --}}
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{$apartaments->links()}}
        </div>
      </div>
    </div>
@endsection
