<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profile(){
        return view('users.profile', array('user' => Auth::user()) );
    }


    public function update_avatar(Request $request){
        if($request->hasFile('avatar')){
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $filename = time() . $user->id . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
            $user->save();
        }
        return view('users.profile', array('user' => Auth::user()) );
    }
}
