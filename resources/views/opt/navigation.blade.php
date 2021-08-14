{{-- <nav class="navbar navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Aston Events</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/events">Events</a></li>
        <li><a href="/organisers">Organisers</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item">
            <a href="/dashboard">{{ Auth::user()->name }}</a>
          </li>
          <li>
              <a href="{{ url('/logout') }}">Log out</a>
          </li>
      @endguest
      </ul>
    </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">AstonEvents</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/events">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/organisers">Organisers</a>
          </li>
        </ul>


        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @guest
                    User
                @endguest
                @auth
                    {{Auth::user()->name}}
                @endauth
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @guest
                    <li><a class="dropdown-item" href="/login">Login</a></li>
                    <li><a class="dropdown-item" href="/register">Register</a></li>  
                @endguest     
                @auth
                    <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>  
                @endauth
                </ul>
            </li>
        </ul>


      </div>
    </div>
  </nav>