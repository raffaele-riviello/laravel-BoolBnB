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
          @foreach ($errors->all() as $message)
              {{$message}}
          @endforeach
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Apartaments</li>
            </ol>
          </nav>
          <form action="{{route('admin.apartaments.update', $apartament->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" name="title" id="title" class="form-control" value="{{old('title') ?? $apartament->title}}">
            </div>
            <div class="form-group">
              {{-- ricordarci il ckeditor --}}
              <label for="description">Descrizione</label>
              {{-- <input type="text" name="description" id="description" class="form-control" value="{{old('description') ?? $apartament->description}}"> --}}
              <textarea id="editor" name="description" rows="8" cols="80" class="form-control">{{old('description') ?? $apartament->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="cover_img">Fotografia principale</label>
              {{-- @foreach ($apartament->cover_img as $photo) --}}
              <img class="card-img-top"  src="{{asset('storage/'. $apartament->cover_img)}}" alt="{{$apartament->title}}">
              {{-- @endforeach --}}
            </div>
            <div class="form-group">
              <label for="rooms_number">Numero di stanze</label>
              <input type="number" name="rooms_number" class="form-control" value="{{old('rooms_number') ?? $apartament->rooms_number}}">
            </div>
            <div class="form-group">
              <label for="bathrooms_number">Numero di bagni</label>
              <input type="number" name="bathrooms_number" class="form-control" value="{{old('bathrooms_number') ?? $apartament->bathrooms_number}}">
            </div>
            <div class="form-group">
              <label for="beds_number">Numero di letti</label>
              <input type="number" name="beds_number" class="form-control" value="{{old('beds_number') ?? $apartament->beds_number}}">
            </div>
              <!-- Default switch -->
                {{-- <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitches" name="visible">
                  <label class="custom-control-label" for="customSwitches" value="1">Visible</label>
                </div> --}}
                <div class="form-group">
                  <label for="visible">Visible/Hidden</label>
                  <select class="form-control" id="visible" name="visible">
                    <option value="1"  {{ $apartament->visible == 1 ? 'selected' : '' }}>
                        Visible
                    </option>
                    <option value="0" {{ $apartament->visible == 0 ? 'selected' : '' }}>
                        Hidden
                    </option>
                  </select>
                </div>
            <div class="form-group">
              <label for="size">Dimensioni</label>
              <input type="number" name="size" class="form-control" value="{{old('size') ?? $apartament->size}}">
            </div>
            <div class="form-group">
              <label for="address">Indirizzo</label>
              <input type="text" name="address" class="form-control" value="{{old('address') ?? $apartament->address}}">
            </div>
            <div class="form-group">
              <label for="price">Prezzo</label>
              <input type="number" step="0.01" name="price" class="form-control" value="{{old('price') ?? $apartament->price}}">
            </div>
            <div class="form-group">
              <label for="latitude">Latitudine</label>
              <input type="number" step="0.01" name="latitude" class="form-control" value="335" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="longitude">Longitudine</label>
              <input type="number" step="0.01" name="longitude" class="form-control" value="555" readonly="readonly">
            </div>

            <div class="form-group">
              <fieldset>
                <legend>Caratteristiche</legend>
                @foreach ($features as $feature)
                <div class="form-check form-check-inline">

                  @if(is_array( old('features')))
                      <input class="form-check-input"  type="checkbox" name="features[]" id="feature{{$feature['id']}}" value="{{$feature['id']}}"
                      {{
                        (in_array($feature['id'],   old('features')))

                        ? 'checked' : ''
                      }}
                      >
                  @else
                    <input class="form-check-input"  type="checkbox" name="features[]" id="feature{{$feature['id']}}" value="{{$feature['id']}}"
                      {{
                        ($apartament->features->contains($feature['id']))

                        ? 'checked' : ''
                      }}
                       >
                  @endif

                  <label class="form-check-label" for="feature{{$feature['id']}}">{{$feature['name']}}</label>
              </div>
              @endforeach
              @error('features')
                <small class="form-text">Errore</small>
              @enderror
              </fieldset>
            </div>

            <div class="form-group">
              <fieldset>
                <legend>Servizi</legend>
                @foreach ($services as $service)
                <div class="form-check form-check-inline">

                  @if(is_array( old('services')))
                      <input class="form-check-input"  type="checkbox" name="services[]" id="feature{{$service['id']}}" value="{{$service['id']}}"
                      {{
                        (in_array($service['id'],   old('services')))

                        ? 'checked' : ''
                      }}
                      >
                  @else
                    <input class="form-check-input"  type="checkbox" name="services[]" id="service{{$service['id']}}" value="{{$service['id']}}"
                      {{
                        ($apartament->services->contains($service['id']))

                        ? 'checked' : ''
                      }}
                       >
                  @endif

                  <label class="form-check-label" for="service{{$service['id']}}">{{$service['name']}}</label>
              </div>
              @endforeach
              @error('services')
                <small class="form-text">Errore</small>
              @enderror
              </fieldset>
            </div>



            <input type="submit" value="Salva" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
@endsection
