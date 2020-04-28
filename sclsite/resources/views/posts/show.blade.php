@extends('_layout.master')

@section('content')
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->text_content !!}
    </div>
@endsection