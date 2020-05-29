<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use Auth;

class FollowerController extends Controller
{   

// follower id oszlopnál -> aki be van jelentkezve azokat a sorokat gyűjtse össze 
//(follower id, aki követi a másik usert)
// majd ezeknek 
// user_id(azok a userek akiket követ) van posztja azokat listázza ki (user id = post id -> user_id)
    public function show() 
    {
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
