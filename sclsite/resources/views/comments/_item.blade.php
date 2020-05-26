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
        @auth
            @if (!$comment->is_reply)
                <form action="{{ route('comment.reply', $comment) }}" method ="POST">
                    @csrf
                    <div class="form-group">
                        <textarea placeholder="{{ __('Reply... ') }}" name="comment[text]" class="form-control{{ $errors->has('comment.text') ? ' is-invalid' : '' }}" ></textarea>
                        @foreach ($errors->get('comment.text') as $error)
                            <p class="invalid-feedback">{{ $error }}</p>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button class="btn btn-dark btn-block" tpye="submit">Reply</button>
                    </div>
                </form>
            @endif
        @endauth
        @foreach ($comment->replies as $reply)
            @include('comments._item', ['comment' => $reply])
        @endforeach
    </div>
</div>