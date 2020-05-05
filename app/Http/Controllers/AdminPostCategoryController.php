<?php

namespace App\Http\Controllers;

use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostCategoryController extends Controller
{
    public function index()
    {
        $categories = PostCategory::orderBy('created_at', 'desc')->get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create(PostCategory $category)
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
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

    public function edit($id)
    {
        $categories = PostCategory::where('id', $id)->get()[0];

        return view('admin.categories.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|exists:category',
        ]);

        $postCategory = PostCategory::find($id);
        $postCategory->category = $request->category;
        $postCategory->creator = Auth::user()->username;

        $postCategory->save();

        return redirect()->action('AdminPostCategoryController@index')->with('success', 'Category successfully updated');
    }

    public function destroy($id)
    {
        $postCategory = PostCategory::find($id);

        $postCategory->delete();

        return redirect()->action('AdminPostCategoryController@index')->with('success', 'Post Category successfully deleted');
    }
}
