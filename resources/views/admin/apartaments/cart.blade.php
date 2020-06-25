@php
  use Carbon\Carbon;
  use App\Cart;
@endphp

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

    <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

  @if (session('success_message'))
      <div class="alert alert-success">
          {{ session('success_message')}}
      </div>
  @endif
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="content">
              <form method="post" id="payment-form" action="{{ url('/checkout') }}">
                  @method('POST')
                  @csrf
              <section>
                  <label for="amount">
                      <span class="input-label">Amount</span>
                      <div class="input-wrapper amount-wrapper">
                        <select class="" name="amount">
                          @foreach (\App\Advertising::all() as $advertising)
                            <option id="amount" data-duration="{{$advertising->duration}}" value="{{$advertising->price}}">{{$advertising->name}} - {{$advertising->price}}€</option>
                            @php
                            $start = Carbon::now()->add(15, 'minutes');
                            $end = Carbon::now()->add($advertising->duration, 'hours');
                            @endphp
                          @endforeach
                        </select>
                        <div class="form-group">
                          <input type="hidden" name="start" value="{{$start}}">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="end" value="{{$end}}">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="apartamentid" value="{{request()->route('id')}}">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="advertisingid" value="{{$advertising->id}}">
                        </div>
                      </div>
                  </label>

                  <div class="bt-drop-in-wrapper">
                      <div id="bt-dropin"></div>
                  </div>
              </section>

              <input id="nonce" name="payment_method_nonce" type="hidden" />
              <button class="button" type="submit"><span>Paga</span></button>
          </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          // paypal: {
          //   flow: 'vault'
          // }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>

  @endsection
