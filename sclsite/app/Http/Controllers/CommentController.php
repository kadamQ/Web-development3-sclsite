<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function comment(Comment $comment, CommentRequest $request)
    {
        if (!$comment->is_reply) {

            $comment->replies()->create([
                'user_id' => Auth::user()->id,
                'text' => $request->comment['text'],
            ]);
        }
        return back();
    }
}
