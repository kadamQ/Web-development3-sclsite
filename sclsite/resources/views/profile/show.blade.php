@extends('_layout.master')

@section('content')
    <figure  class="item float-left">   
        <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px;">
        <figcaption class="caption text-center" style="margin-right: 25px;">
            <h5>{{ "Followers: " . $user->followers->count() }} <i class="fas fa-users fa-lg"></i></h5>
            
        </figcaption>
    </figure>

    <div class="d-flex">
    <h1>{{ $user -> nickname . '\'s profile page'}}</h1>
    
    @auth    
        @if ($user->isFollowed(Auth::user()))
            <form class="pt-2 ml-auto text-right" action="{{ route('user.unfollow', $user) }}" method="POST">
                @csrf           
                <button class="btn btn-danger btn-lg" type="submit">
                    <i class="fas fa-times"></i> Unfollow User
                </button>
            </form>
            @else
            <form class="pt-2 ml-auto text-right" action="{{ route('user.follow', $user) }}" method="POST">
                @csrf           
                <button class="btn btn-info btn-lg" type="submit">
                    <i class="fas fa-plus"></i> Follow User
                </button>
            </form>
        @endif
    @endauth
    </div>

    @auth
        @if(Auth::user() == $user)
            <form enctype="multipart/form-data" action="{{ route('profile.update', Auth::user()) }}" method="POST">
            @csrf
                <label>Update Profile Image here: </label><br>
                <input type="file" name="avatar">
                <button type="submit" class="pull-right btn btn-sm btn-dark">UPDATE</button>
            </form>
        @endif
    @endauth
    <div>
        @foreach ($user->posts as $post)
            @include('posts._item')
        @endforeach
    </div>
@endsection  