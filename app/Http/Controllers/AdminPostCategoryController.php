<?php

namespace App\Http\Controllers;

use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostCategoryController extends Controller
{
    public function index()
    {
        $this->redirectIfNotLoggedIn();
        $categories = PostCategory::orderBy('created_at', 'desc')->get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create(PostCategory $category)
    {
        $this->redirectIfNotLoggedIn();

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->redirectIfNotLoggedIn();

        $request->validate([
            'category' => 'required|unique:category',
        ]);

        $postCategory = new PostCategory;
        $postCategory->category = $request->category;
        $postCategory->creator = Auth::user()->username;

        $postCategory->save();

        return redirect()->action('AdminPostCategoryController@index')->with('success', 'Category successfully created');
    }

    public function show(PostCategory $postCategory)
    {
        //
    }

    public function edit(PostCategory $postCategory)
    {
        $this->redirectIfNotLoggedIn();

        $categories = PostCategory::where('category', $postCategory->category)->get();

        return view('admin.posts.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $this->redirectIfNotLoggedIn();

        $request->validate([
            'category' => 'required|unique:category',
        ]);

        $postCategory = PostCategory::find($id);
        $postCategory->category = $request->category;
        $postCategory->creator = Auth::user()->username;

        $postCategory->save();

        return redirect()->action('AdminPostCategoryController@index')->with('success', 'Category successfully updated');
    }

    public function destroy($id)
    {
        $this->redirectIfNotLoggedIn();

        $postCategory = postCategoryCategory::find($id);
        $postCategory->delete();

        return redirect()->action('AdminPostController@index')->with('success', 'Post successfully deleted');
    }

    public function redirectIfNotLoggedIn()
    {
        if (!Auth::user()) {
            die(redirect()->action('PostController@index'));
        }
    }
}
