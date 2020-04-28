<article class="card mb-5">
    <div class="card-header">
        <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
        @can('update', $post)
            <a href="{{ route('post.edit', $post) }}">{{ __('edit') }}</a>
        @endcan
    </div>
    <div class="card-body">
        <div> {!! $post->text_content !!} </div>
        <p>{{ $post->tag->title }}</p>
    </div>
</article>