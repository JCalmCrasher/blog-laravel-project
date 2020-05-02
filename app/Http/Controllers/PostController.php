<?php

namespace App\Http\Controllers;

use App\Comment;
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
        $categories = PostCategory::all();
        $recentPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();

        $postComments = Comment::where('post_id', $id)->where('approved', 1)->orderBy('created_at', 'desc')->get();

        return view('posts.index', ['post' => Post::findOrFail($id), 'recentPosts' => $recentPosts, 'categories' => $categories, 'comments' => $postComments]);
    }
}
