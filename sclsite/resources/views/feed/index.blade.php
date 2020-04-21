@extends('_layout.master')

@section('content')
    @foreach($posts as $post)
       @include('posts._item')
    @endforeach
@endsection