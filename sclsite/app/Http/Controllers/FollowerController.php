<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FollowerController extends Controller
{
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
