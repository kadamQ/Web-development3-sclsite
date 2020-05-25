<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Comment $comment, Request $request)
    {
        if (!$comment->is_reply) {

            $comment->replies()->create([
                'user_id' => Auth::user()->id,
                'text' => $request->comment,
            ]);
        }
        return back()->with(['success', __('Reply saved succesfully')]);
    }
}
