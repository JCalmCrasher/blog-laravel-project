<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $allCategories = PostCategory::all();
        $postCategory = PostCategory::where('category', $id)->get();
        $recentPosts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $posts = Post::where('category', $postCategory[0]->category)->get();

        return view('posts.categories', ['category' => $postCategory[0]->category, 'posts' => $posts, 'categories' => $allCategories, 'recentPosts' => $recentPosts,]);
    }
}
