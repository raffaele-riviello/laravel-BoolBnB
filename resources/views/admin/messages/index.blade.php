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
          <ul class="nav justify-content-center">
            <li class="nav-item">
               <a class="nav-link active" href="{{route('dashboard')}}">Torna alla dashboard</a>
            </li>
          </ul>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Nome Mittente</th>
                <th>Email</th>
                <th colspan="3">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($messages as $message)
                  <tr>
                    <td>{{$message->id}}</td>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td><a class="btn btn-primary" href="{{route('messages.show', $message->id)}}">Visualizza</a></td>
                    <td>
                      @if(Auth::id() == $message->apartament_id)
                      <form action="{{route('messages.destroy', $message->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Elimina">
                      </form>
                      @endif
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{$apartaments->links()}} --}}
        </div>
      </div>
    </div>
@endsection
