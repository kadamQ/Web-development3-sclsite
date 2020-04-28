<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('feed.index') }}">SCLsite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        {{-- <li class="nav-item active">
          <a class="nav-link" href="#">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      {{-- <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form> --}}
      <ul class ="navbar-nav"> 
          <ul class="navbar-nav">
          @auth
            <li class="nav-item">
              <form action="{{ route ('logout') }}"  method="POST">
                @csrf
                <button class="btn btn-dark" href="{{ route('logout') }}">Logout </a> </button>
                </form>
            </li>
          @else 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}"> Become a member </a>
          </li>
          <li class="nav-item">         
          <a class="nav-link" href="{{ route('login') }}"> Login </a>
          </li>
          @endauth
        </ul>
    </div>
  </nav>
</header>
