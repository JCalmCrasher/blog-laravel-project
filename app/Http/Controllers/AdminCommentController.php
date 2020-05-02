<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->redirectIfNotLoggedIn();
        $comments = Post::join('comments', 'posts.id', 'comments.post_id')
            ->orderBy('comments.created_at', 'desc')
            ->get();

        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // return $id;
        $this->redirectIfNotLoggedIn();

        $comment = Comment::where('id', $id)->get();
        if ($comment[0]->approved == 0) {
            $isApproved = Comment::where('id', $id)->update(['approved' => 1]);

            if ($isApproved) {
                return redirect()->action('AdminCommentController@index')->with('success', $comment[0]->commenter_name . "'s comment has been approved");
            } else {
                return redirect()->action('AdminCommentController@index')->with('error', "Could not approve comment, please try again");
            }
        } else {
            $isDisapproved = Comment::where('id', $id)->update(['approved' => 0]);

            if ($isDisapproved) {
                return redirect()->action('AdminCommentController@index')->with('success', $comment[0]->commenter_name . "'s comment has been disapproved");
            } else {
                return redirect()->action('AdminCommentController@index')->with('error', "Could not disapprove comment, please try again");
            }
        }
    }

    public function destroy(Comment $comment)
    {
        //
    }

    public function redirectIfNotLoggedIn()
    {
        if (!Auth::user()) {
            die(redirect()->action('PostController@index'));
        }
    }
}
