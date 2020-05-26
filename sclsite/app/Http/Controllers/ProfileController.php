<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profile.show')->with(compact('user'));
    }

    public function update(User $user, Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));
            
            $user->avatar = $filename;
            $user->save();
        }
        return redirect()->route('profile.show', ['user' => $user]);
    }
}
