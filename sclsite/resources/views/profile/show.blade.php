@extends('_layout.master')

@section('content')
    <h1>{{ $user -> nickname }} profile page 
    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
    </h1>
    @auth
        <form enctype="multipart/form-data" action="{{ route('profile.update', Auth::user()) }}" method="POST">
        @csrf
            <label>Update Profile Image </label>
            <input type="file" name="avatar">
            <button type="submit" class="pull-right btn btn-sm btn-dark">UPDATE</button>
        </form>
    @endauth
    <div>
        @foreach ($user->posts as $post)
            @include('posts._item')
        @endforeach
    </div>

@endsection  