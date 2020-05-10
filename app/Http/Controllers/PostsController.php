<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $author = User::whereId($post->user_id)->firstOrFail();
        $related_posts = $post->categories()->get();

        return view('posts.show', compact('post', 'related_posts', 'author'));
    }
}
