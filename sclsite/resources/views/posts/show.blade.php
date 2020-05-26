@extends('_layout.master')

@section('content')
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->text_content !!}
    </div>
    <hr>
    <form action="{{ route('post.comment', $post) }}" method ="POST">
            @csrf
            <div class="form-group">
            <textarea class="form-control" name="comment" placeholder="{{ __("Comment... ") }}"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-dark btn-block" tpye="submit">Comment</button>
            </div>
        </form>   
    <h3>{{ __("Comments") }}</h3>
    <div>
        @foreach ($post->comments as $comment)
            @include('comments._item')
        @endforeach
    </div>
@endsection