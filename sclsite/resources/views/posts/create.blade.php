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
    <h3 class="card-header">{{ __('Create your Post!') }}</h3>
    <div class="card-body">
        <form action="{{ route('post.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="post[title]">{{ __('Title') }}</label>
                <input class="form-control{{ $errors->has('post.title') ? ' is-invalid' : '' }}" type="text" name="post[title]" value="{{ old('post.title') }}">
                @foreach ($errors->get('post.title') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group">
                <label for="post[tag_id]">{{ __('Tag') }}</label>
                <select class="form-control{{ $errors->has('post.tag_id') ? ' is-invalid' : '' }}" name="post[tag_id]">
                    <option>{{ __("Select your tag") }}</option>
                    @foreach ($tag_options as $tag)
                        <option value="{{ $tag->id }}" {{ $tag->id == old('post.tag_id') ? 'selected' : '' }}>{{ $tag->title }}</option>
                    @endforeach
                </select>
                @foreach ($errors->get('post.tag_id') as $error)
                <p class="invalid-feedback">{{ $error }}</p>
            @endforeach
            </div>

            <div class="form-group">
                <label for="post[text_content]">{{ __('Content') }}</label>
                <textarea id="editor" class="form-control{{ $errors->has('post.text_content') ? ' is-invalid' : '' }}" name="post[text_content]">{{ old('post.text_content') }}</textarea>
                @foreach ($errors->get('post.text_content') as $error)
                    <p class="invalid-feedback">{{ $error }}</p>
                @endforeach
            </div>

            <div class="form-group text-left">
                <button class="btn btn-outline-success btn-lg" type="submit">{{ __('Post') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection