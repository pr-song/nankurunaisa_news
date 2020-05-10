<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentsController extends Controller
{
    public function newComment(CommentFormRequest $request)
    {
        $comment = new Comment([
            'post_id' => $request->post_id,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        $comment->save();

        return redirect()->back();
    }
}
