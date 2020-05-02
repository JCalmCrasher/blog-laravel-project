<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $this->redirectIfNotLoggedIn();
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users.index', ['users' => $users]);
    }

    public function create(User $user)
    {
        $this->redirectIfNotLoggedIn();

        return view('admin.users.create', ['users' => $user->all()]);
    }

    public function store(Request $request)
    {
        $this->redirectIfNotLoggedIn();

        $request->validate([
            'username' => 'required|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'lastname' => 'required',
            'password' => 'required',
        ]);

        $user = new User;
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->action('AdminUserController@index')->with('success', 'User successfully created');
    }

    public function edit(User $user)
    {
        $this->redirectIfNotLoggedIn();

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->redirectIfNotLoggedIn();

        $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'lastname' => 'required',
            'password' => 'required',
        ]);

        $user = User::findOrFail($id);
        // $sql = User::where('username', $request->username)->get();
        // return count($sql);
        $user->username = $request->username;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->action('AdminUserController@index')->with('success', 'User successfully updated');
    }

    public function destroy(Request $request, $id)
    {
        $this->redirectIfNotLoggedIn();

        $user = User::find($id);
        $user->delete();

        return redirect()->action('AdminUserController@index')->with('success', 'User successfully deleted');
    }

    public function redirectIfNotLoggedIn()
    {
        if (!Auth::user()) {
            die(redirect()->action('PostController@index'));
        }
    }
}
