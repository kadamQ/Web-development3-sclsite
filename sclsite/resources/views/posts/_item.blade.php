<article class="post card mb-3">
    <div class="card-header d-flex">
        <div class="mr-auto">
            <h2> <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }} </a> </h2>
            <h5 class="font-italic text-info ml-auto"> {{ $post->tag->title }} </h5>
        </div>
        <div class="ml-auto">
            <p class= "text-right">
                @can('update', $post)
                    <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-outline-danger ml-2">
                        {{ __('EDIT') }} </a>
                @endcan
                <a href="{{ route('profile.show', $post->user) }}" class="btn btn-sm btn-outline-dark ml-2">
                    {{ 'Created by: '. $post->user->nickname }} </a>
                    <img src="/uploads/avatars/{{ $post->user->avatar }}" style="position:relative; width:32px; height:32px; left:5px;  border-radius:50%">      
                <form action="{{ route('post.vote', $post) }}" method="POST">
                    <div class="form-group text-right">
                    @csrf
                        <button class="btn btn-outline-info btn-lg" type="submit">
                            {{ $post->isLiked() ? __('LIKE') : __('DISLIKE') }}</button>
                    </div>
                </form>         
            </p>    
        </div>
    </div>
    <div class="card-body mr-auto">
        <p> {!! $post->text_content !!} </p>
    </div>
    <div class="card-footer text-light bg-secondary text-center">
            <i class="far fa-comments"> {{ $post->comments->count() }} ||</i>
            <i class="far fa-thumbs-up">{{ $post->votes->count() }}</i>
    </div>
</article> 