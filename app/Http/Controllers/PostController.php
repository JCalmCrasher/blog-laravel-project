<?php

namespace App\Http\Controllers;

use App\Post;
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
        $post = Post::orderBy('created_at', 'desc')->get();
        return view('index', ['posts' => $post]);
    }

    public function show($id)
    {
        return view('posts.index', ['post' => Post::findOrFail($id)]);
    }
}
