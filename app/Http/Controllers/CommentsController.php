<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;

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
