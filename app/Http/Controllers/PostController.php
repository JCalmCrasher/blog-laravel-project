<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('created_at', 'desc')->paginate(3);
        $recentPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        return view('index', ['posts' => $post, 'categories' => PostCategory::all(), 'recentPosts' => $recentPosts]);
    }

    public function show($id)
    {
        return view('posts.index', ['post' => Post::findOrFail($id)]);
    }
}
