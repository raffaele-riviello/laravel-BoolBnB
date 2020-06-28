@php
  use Carbon\Carbon;
  use App\Cart;
@endphp
@extends('layouts.app')
@section('bootstrap')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('header')
  @include('partials.headerBasso')
@endsection
  @section('main')
    <!-- Styles -->
        <style>
         .button {
    -webkit-transition: background-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), border-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), opacity 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
    -moz-transition: background-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), border-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), opacity 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
    -ms-transition: background-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), border-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), opacity 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
    -o-transition: background-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), border-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), opacity 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
    transition: background-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), border-color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), color 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95), opacity 140ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
    background-color: #5CD493;
    border: none;
    border-radius: 2px;
    display: inline-block;
    color: #fff;
    font-family: "BT Mono bold", "Helvetica Neue", Helvetica, Sans-serif;
    font-size: 16px;
    letter-spacing: 0;
    line-height: normal;
    opacity: 1;
    outline: none;
    padding: 0;
    position: relative;
    text-decoration: none;
    text-align: center;
    width: 100%;
}
         .button span {
    -webkit-transition: color 140ms ease;
    -moz-transition: color 140ms ease;
    -ms-transition: color 140ms ease;
    -o-transition: color 140ms ease;
    transition: color 140ms ease;
    display: inline-block;
    padding: 1em 2.5em 1.15em;
    position: relative;
    text-align: center;
}
.checkout .button {
    -webkit-animation-delay: 650ms;
    -moz-animation-delay: 650ms;
    animation-delay: 650ms;
    -webkit-animation-duration: 700ms;
    -moz-animation-duration: 700ms;
    animation-duration: 700ms;
}
.ads {
    width: 600px;
    height: 50px;
    margin: 10px;
    padding: 10px;
}
#bt-dropin {
    width: 600px;
    margin: 10px;
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
                      <span class="input-label">Scegli il tipo di sponsorizzazione</span>
                      <div class="input-wrapper amount-wrapper">
                        <select class="ads" name="amount">
                          @foreach (\App\Advertising::all() as $advertising)
                            <option id="amount" data-duration="{{$advertising->duration}}" value="{{$advertising->price}}">{{$advertising->name}} - {{$advertising->price}}€</option>
                            @php
                            $start = Carbon::now()->add(15, 'minutes');
                            $end = Carbon::now()->add($advertising->duration, 'hours');
                            @endphp
                          @endforeach
                        </select>
                        <div class="form-group">
                          <input type="hidden" name="start" value="{{$start ?? ''}}">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="end" value="{{$end ?? ''}}">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="apartamentid" value="{{request()->route('id')}}">
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="advertisingid" value="{{$advertising->id ?? ''}}">
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
  @section('svg')
    @include('partials.svg_logo')
  @endsection
