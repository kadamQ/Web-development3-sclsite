<div class="comment">
    <div class="card mb-2">
        <div class="card-body">       
        <p>
        <a href="{{ route('profile.show', $comment->user) }}">
            {{ $comment->user->nickname }}
        </a>
             | {{ $comment->created_at->diffForhumans() }}
             | Replies: {{ $comment->replies->count() }}
        </p>
        <p>{{ $comment->text }}</p>
        </div>
    </div>
    <div class="replies pl-5">
            @if (!$comment->is_reply)
                <form action="{{ route('comment.reply', $comment) }}" method ="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="comment" placeholder="{{ __('Comment... ') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark btn-block" tpye="submit">Reply</button>
                    </div>
                </form>  
            @endif
        @foreach ($comment->replies as $reply)
            @include('comments._item', ['comment' => $reply])
        @endforeach
    </div>
</div>