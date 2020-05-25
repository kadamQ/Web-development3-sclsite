<article class="card mb-3">
    <div class="card-header">
        <a href="{{ route('post.show', ['post' => $post]) }}">
            {{ $post->title }}
        </a>
        @can('update', $post)
            <a href="{{ route('post.edit', $post) }}">{{ __('edit') }}</a>
        @endcan
        | Created by <a href="{{ route('profile.show', $post->user) }}">
            {{ $post->user->nickname }}
        </a>
        | Comments: {{ $post->comments->count() }}
        | Votes: 
    </div>
    <div class="card-body">
        <p> {!! $post->text_content !!} </p>
        <p>{{ $post->tag->title }}</p>
    </div>
</article> 