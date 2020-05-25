<div class="comment">
    <div class="card mb-2">
        <div class="card-body">       
        <p>
        <a href="{{ route('profile.show', $comment->user) }}">
            {{ $comment->user->nickname }}
        </a>
             | {{ $comment->created_at->diffForhumans() }}
        </p>
        <p>{{ $comment->text }}</p>
        </div>
    </div>
    <div class="replies pl-5">
        @auth
            @if (!$comment->is_reply)
                <form action="{{ route('comment.reply', $comment) }}" method ="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="comment" placholder="{{ __('Comment... ') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" tpye="submit">Reply</button>
                    </div>
                </form>  
            @endif
        @endauth
        @foreach ($comment->replies as $reply)
            @include('comments._item', ['comment' => $reply])
        @endforeach
    </div>
</div>