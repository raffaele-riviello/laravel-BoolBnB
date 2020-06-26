@extends('layouts.admin')
@section('title')
    Accedi
@endsection
@section('login')
  <div class="container form">
    <form method="POST" action="{{ route('login') }}" class="login-form formdk">
      @csrf

      <h1>Login</h1>

      <div class="txtb">
        <input id="email" type="email" class="inputdk @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        <span data-placeholder="Email"></span>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="txtb">
        <input id="password" type="password" class="inputdk @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        <span data-placeholder="Password"></span>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="txtb">
        <label class="acaso" for="remember">
            {{ __('Remember Me') }}
        </label>

        <input class="inputdk" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>


      </div>

      <input type="submit" class="logbtn inputdk" value="Login">

      <div class="bottom-text">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
      </div>

    </form>
  </div>


  <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
