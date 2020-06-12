<header>
    <nav class="navbar navbar-light bg-light justify-content-between">
      <a class="navbar-brand" href="{{ url('/home') }}">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png" width="150" height="50" class="d-inline-block align-top" alt="">
      </a>
      @if (Route::has('login'))
          <div class="top-right links">
              @auth
                  <a href="{{ url('/home') }}">Home</a>
              @else
                  <button type="button" class="btn btn-outline-info"><a href="{{ route('login') }}">Accedi</a></button>

                  @if (Route::has('register'))
                      <button type="button" class="btn btn-outline-info"><a href="{{ route('register') }}">Registrati</a></button>
                  @endif
              @endauth
          </div>
      @endif
      </div>
    </nav>
</header>
