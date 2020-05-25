@extends('_layout.master')

@section('content')
    <h1>{{ $user -> nickname }} profile page </h1>
    <div>
        @foreach ($user->posts as $post)
            @include('posts._item')
        @endforeach
    </div>

@endsection  