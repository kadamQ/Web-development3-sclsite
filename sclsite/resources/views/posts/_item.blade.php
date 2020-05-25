<article class="post card mb-3">
    <div class="card-header d-flex">
        <div class="mr-auto">
            <h2> <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }} </a> </h2>
            <h5 class="font-italic text-info ml-auto"> {{ $post->tag->title }} </h5>
        </div>
        <div class="ml-auto">
            <p class= "text-right">
            @can('update', $post)
                <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-outline-danger ml-2">{{ __('EDIT') }} </a>
            @endcan
            Created by <a href="{{ route('profile.show', $post->user) }}" class="btn btn-sm btn-outline-dark ml-2">
                {{ $post->user->nickname }} </a>
            Comments: {{ $post->comments->count() }}      
            Votes: 0
            </p>
        </div>
    </div>
    <div class="card-body mr-auto">
        <p> {!! $post->text_content !!} </p>
    </div>
</article> 