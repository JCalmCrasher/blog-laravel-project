<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create(PostCategory $category)
    {
        return view('admin.posts.create', ['posts' => $category->all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts',
            'post_excerpt' => 'required',
            'post_body' => 'required',
            'category' => 'required',
        ]);

        // file path
        $path = $request->file('post_image')->store('posts');

        $post = new Post;
        $post->post_title = $request->post_title;
        $post->post_excerpt = $request->post_excerpt;
        $post->post_body = $request->post_body;
        $post->category = $request->category;
        $post->creator = Auth::user()->username;
        $post->post_image = $path;

        $post->save();

        return redirect()->action('AdminPostController@index')->with('success', 'Post successfully created');
    }

    public function edit(Post $post)
    {
        $postCategory = PostCategory::where('category', $post->category)->get();
        $selectedCategory = [$postCategory[0]->category];

        // save this, to populate category select box
        $categories = PostCategory::all();
        return view('admin.posts.edit', compact('post', 'categories', 'selectedCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required|exists:posts',
            'post_excerpt' => 'required',
            'post_body' => 'required',
            'category' => 'required',
        ]);

        // file path
        $path = $request->file('post_image')->store('posts');

        $post = Post::find($id);

        $post->post_title = $request->post_title;
        $post->post_excerpt = $request->post_excerpt;
        $post->post_body = $request->post_body;
        $post->category = $request->category;
        $post->creator = Auth::user()->username;
        $post->post_image = $path;

        $post->save();

        return redirect()->action('AdminPostController@index')->with('success', 'Post successfully updated');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->action('AdminPostController@index')->with('success', 'Post successfully deleted');
    }
}
