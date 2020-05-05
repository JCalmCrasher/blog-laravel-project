<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    public function edit($id)
    {
        $profile = User::where('id', $id)->get()[0];
        return view('admin.profile', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|max:50',
            'email' => 'required|max:100',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
        ]);

        // file path
        $path = $request->file('avatar')->storeAs(
            'avatars',
            $request->user()->username .
                '.' . $request->file('avatar')
                ->extension()
        );
        
        $profile = User::find($id);

        $profile->username = $request->username;
        $profile->email = $request->email;
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->password = Hash::make($request->password);
        $profile->profile_pic = $path;

        $profile->save();

        $action = redirect()->action('UserProfileController@edit', [$id])->with('success', 'Profile updated successfully');

        return $action;
    }
}
