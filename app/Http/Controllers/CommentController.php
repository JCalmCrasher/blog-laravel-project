<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function __invoke(Request $request)
    {
        $post_id = $request->session()->get('post_id');

        $request->validate([
            'commenter_name' => 'required',
            'comment' => 'required'
        ]);

        $comment = new Comment;
        $comment->post_id = $post_id;
        $comment->commenter_name = $request->commenter_name;
        $comment->content = $request->comment;

        $comment->save();
        
        $request->session()->forget('post_id');

        return redirect("posts/$post_id")->with('success', 'Your comment has been posted successfully, an admin will moderate your comment soon.');
    }
}
