<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Vote;
use Auth;

class VotesController extends Controller
{
    public function votePost(Request $request, Post $post){
        $post_id = $post['id'];
        $isLike = true;
        $update = false;
        $post = Post::find($post_id);
        if (!$post){
            return redirect()->route('feed.index');
        }
        $user = Auth::user();
        $vote = $post->votes()->where('user_id', $user['id'])->first();
        if ($vote) {
            $already_vote = $vote->vote;
            $update = true;
            if ($already_vote == $isLike){
                $vote->delete();
                return back();
            }
        } else {
            $vote = new Vote();
        }
        $vote->vote = $isLike;
        $vote->user_id = $user->id;
        $vote->post_id = $post->id;
        if ($update) {
            $vote->update();
        } else {
            $vote->save();
        }
        return back();
    }
}
