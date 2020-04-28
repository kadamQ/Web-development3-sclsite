@extends('_layout.master')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->text_content }}</p>
    <div>
        {!! $post->content !!}
    </div>
@endsection