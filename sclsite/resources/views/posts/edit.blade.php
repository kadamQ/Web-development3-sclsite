@extends('_layout.master')

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.getElementById('editor'))
        .catch(error => {
            console.error(error)
        })
</script>
@endpush

@section('content')
<div class="card w-75 mt-5 mx-auto">
    <div class="card-header">         
        <form action="{{ route('post.delete', ['post' => $post]) }}" method="POST">
            <h3 class="form group text-left">
                {{ __('Edit post: ') }} {{$post->title}}
                @csrf           
                <button onclick="return confirm('Are you sure to delete this post?')" class="float-right far fa-trash-alt btn btn-secondary btn-lg" type="submit"></button>
            </h3>
        </form>
    </div>
    <div class="card-body">
        <form action="{{ route('post.edit', ['post' => $post]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="post[title]">{{ __('Title') }}</label>
                <input class="form-control{{ $errors->has('post.title') ? ' is-invalid' : '' }}" type="text" name="post[title]" value="{{ old('post.title', $post ->title) }}">
                @foreach ($errors->get('post.title') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="post[tag_id]">{{ __('Tag') }}</label>
                <select class="form-control{{ $errors->has('post.tag_id') ? ' is-invalid' : '' }}" name="post[tag_id]">
                    <option>{{ __("Select your tag") }}</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $tag->id == old('post.tag_id', $post->tag_id) ? 'selected' : '' }}>{{ $tag->title }}</option>
                    @endforeach
                </select>
                @foreach ($errors->get('post.tag_id') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="post[text_content]">{{ __('Content') }}</label>
                <textarea id="editor" class="form-control{{ $errors->has('post.text_content') ? ' is-invalid' : '' }}" name="post[text_content]">{{ old('post.text_content', $post->
                text_content) }}</textarea>
                @foreach ($errors->get('post.text_content') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach

            </div>
            <div class="form-group text-left">
                <button class="btn btn-outline-danger btn-lg" type="submit">{{ __('Update') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection