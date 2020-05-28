<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $this->validate($request, ['avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',]);
            if($user->avatar != 'default.jpg'){
                if(file_exists(public_path('uploads/avatars/'. $user->avatar))){
                    unlink(public_path('uploads/avatars/'. $user->avatar));
                }
            }
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
            $user->save();
        }
        return redirect()->route('profile.show', ['user' => $user]);
    }
}
