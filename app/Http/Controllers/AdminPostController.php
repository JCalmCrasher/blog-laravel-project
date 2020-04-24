<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('admin.posts', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts',
            'post_excerpt' => 'required',
            'post_body' => 'required',
        ]);

        $post = new Post();
        $post->post_title = request('post_title');
        $post->post_excerpt = request('post_excerpt');
        $post->post_body = request('post_body');
        $post->creator = Auth::user()->username;

        $isSaved = $post->save();

        $isSaved ? $request->session()->flash('post_status', 'Post inserted successfully!') : abort('500', 'Eroor');
        
        redirect('admin/posts', 200);
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
