<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    private $default_password = '123456';

    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function create(User $user)
    {
        return view('admin.users.create', ['users' => $user->all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'lastname' => 'required',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($this->default_password);

        $user->save();

        return redirect()->action('AdminUserController@index')->with('success', 'User successfully created');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|exists:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'lastname' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($this->default_password);

        $user->save();

        return redirect()->action('AdminUserController@index')->with('success', 'User successfully updated');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->action('AdminUserController@index')->with('success', 'User successfully deleted');
    }
}
