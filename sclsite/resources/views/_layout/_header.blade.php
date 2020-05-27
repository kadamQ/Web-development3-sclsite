<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{ route('feed.index') }}">SCLsite</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" 
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
          @auth
            <li class="nav-item">
              <a class="btn btn-outline-light" href="{{ route('post.create') }}">{{ __('Create a post!') }}</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('profile.show', Auth::user()) }}">
                {{ Auth::user()->nickname }} 
              </a>
            </li>
            <li class="nav-item">
              <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="position:relative; width:32px; height:32px; top:5px; border-radius:50%">
            </li>
            <li class="nav-item">
              <form action="{{ route ('logout') }}"  method="POST">
                @csrf
                <button class="nav-link btn btn-link" type="submit" >Logout </button>
                </form>
            </li>
          @else 
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}"> Sign up! </a>
          </li>
          <li class="nav-item">         
            <a class="nav-link" href="{{ route('login') }}"> Login </a>
          </li>
          @endauth
        </ul>
    </div>
  </nav>
</header>
