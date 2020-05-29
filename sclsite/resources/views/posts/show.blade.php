@extends('_layout.master')

@section('content')
    <h1>{{ $post->title }}</h1>
    <div>
        {!! $post->text_content !!}
    </div>
    <hr>
    @auth
    <form action="{{ route('post.comment', $post) }}" method ="POST">
            @csrf
            <div class="form-group">
                <textarea placeholder="{{ __('Comment... ') }}" name="comment[text]" class="form-control{{ $errors->has('comment.text') ? ' is-invalid' : '' }}" ></textarea>
                @foreach ($errors->get('comment.text') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>
            <div class="form-group">
                <button class="btn btn-dark btn-block" tpye="submit">Comment</button>
            </div>
        </form>
    @endauth   
    <h3>{{ __("Comments") }}</h3>
    <div>
        @foreach ($post->comments as $comment)
            @include('comments._item')
        @endforeach
    </div>
@endsection