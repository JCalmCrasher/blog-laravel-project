<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    public function edit(User $user)
    {
        $user = Auth::user()->username;
        $profile = User::where('username', $user)->get()[0];
        return view('admin.profile', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|max:50',
            'email' => 'required|max:100',
            'firstname' => 'required|max:50',
            'lastname' => 'required|max:50',
            'current_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        $profile = User::find($id);
        $user_password = $profile->get()[0]->password;

        if (Hash::check($request->current_password, $user_password)) {
            $profile->username = $request->username;
            $profile->email = $request->email;
            $profile->firstname = $request->firstname;
            $profile->lastname = $request->lastname;
            $profile->password = Hash::make($request->password);
            // $profile->profile_pic=;
            $path = $request->file('avatar')->store('avatars');

            return $path;

            $profile->save();

            $action = redirect()->action('UserProfileController@edit', [$id])->with('success', 'Profile updated successfully');
        } else {
            $action = redirect()->action('UserProfileController@edit', [$id])->with('success', 'Incorrect current password entered');
        }

        return $action;
    }

    public function destroy(User $user)
    {
        //
    }
}
