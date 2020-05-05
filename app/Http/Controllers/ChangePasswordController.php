<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit($id)
    {
        $profile = User::where('id', $id)->get()[0];
        return view('admin.password', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        $profile = User::find($id);

        if (Hash::check($request->current_password, $profile->get()[0]->password)) {
            $profile->password = Hash::make($request->password);

            $action = redirect()->action('ChangePasswordController@edit', [$id])->with('success', 'Password updated successfully');

            $profile->save();
        } else {
            $action = redirect()->action('ChangePasswordController@edit', [$id])->with('success', 'Incorrect current password entered');
        }

        return $action;
    }
}
