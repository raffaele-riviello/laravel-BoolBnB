<div class="hidden-header hd">
      <div class="container">
        <div class="upper-header">
          <div id="logo">
            <svg><use href="#airbnb"></use></svg>
            <a href="{{route('home')}}"><h4>BoolBnb</h4></a>
          </div>

          <nav>
            <ul id="menu">
              <li> <a href="#">Scopri di più <i class="fas fa-sort-down"></i></a>
                <div class="dropdown-outer">
                  <div class="dropdown-inner">
                    <ul>
                      <li> <a href="#">Chi siamo</a> </li>
                      <li> <a href="#">Feedback</a> </li>
                      <li> <a href="#">Reviews</a> </li>
                      <li> <a href="#">Lingua</a> </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li> <a href="#">Assistenza</a> </li>
              @guest
              <li> <a href="{{ route('login') }}">Accedi</a> </li>
              @if (Route::has('register'))
                <li>
              {{-- <div class="btn-container"> --}}
                <button href="{{ route('register') }}" class="btn-base" type="button" name="button"><img src="{{asset('/img/conversation.svg')}}" alt="">Registrati</button>
              {{-- </div> --}}
              </li>
              @endif
            </ul>
          </nav>

          @else
            <nav>
              <ul id="menu">
            <li> <a href="#">{{ Auth::user()->name }} <i class="fas fa-sort-down"></i></a>
              <div class="dropdown-outer">
                <div class="dropdown-inner">
                  <ul>
                    <li> <a href="{{route('dashboard')}}">Dashboard</a> </li>
                    <li> <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a> </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </ul>
                </div>
              </ul>
            </nav>
          @endguest
        </div>
      </div>
    </div>
  </div>

    <header class="basso">
      <div class="container">
        <div class="upper-header">
          <div id="logo">
            <svg><use href="#airbnb"></use></svg>
            <a href="{{route('home')}}"><h4>BoolBnb</h4></a>
          </div>


          <nav>
            <ul id="menu">
              <li> <a href="#">Scopri di più <i class="fas fa-sort-down"></i></a>
                <div class="dropdown-outer">
                  <div class="dropdown-inner">
                    <ul>
                      <li> <a href="#">Chi siamo</a> </li>
                      <li> <a href="#">Feedback</a> </li>
                      <li> <a href="#">Reviews</a> </li>
                      <li> <a href="#">Lingua</a> </li>
                    </ul>
                  </div>
                </div>
              </li>
              <li> <a href="#">Assistenza</a> </li>
              @guest
              <li> <a href="{{ route('login') }}">Accedi</a> </li>

                @if (Route::has('register'))
                  <li>
                {{-- <div class="btn-container"> --}}
                  <button href="{{ route('register') }}" class="btn-base" type="button" name="button"><img src="{{asset('/img/conversation.svg')}}" alt="">Registrati</button>
                {{-- </div> --}}
                </li>
                @endif

            </ul>
          </nav>

          @else
            <nav>
              <ul id="menu">
            <li> <a href="#">{{ Auth::user()->name }} <i class="fas fa-sort-down"></i></a>
              <div class="dropdown-outer">
                <div class="dropdown-inner">
                  <ul>
                    <li> <a href="{{route('dashboard')}}">Dashboard</a> </li>
                    <li> <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a> </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </ul>
                </div>
              </ul>
            </nav>
          @endguest
            </ul>
          </nav>
        </div>

      </div>
    </header>
