<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use Auth;

class FollowerController extends Controller
{   
    public function show() 
    {
        $posts = Post::orderBy('created_at','desc')->get()->whereIn('user_id',Auth::user()->followed()->get()->pluck('id'));
        return view("follows.show")->with(['posts' => $posts]); 
    }

    public function followUser(User $user)
    {   
        $user->followers()->syncWithoutDetaching(Auth::user()->id);    
        return back();
    }

    public function unFollowUser(User $user)
    {
        $user->followers()->detach(Auth::user()->id);
        return back();
    }
}
