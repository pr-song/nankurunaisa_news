<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->page_views++;
        $post->save();
        $author = User::whereId($post->user_id)->firstOrFail();
        $categories = $post->categories()->get();
        $related_posts_id = [];
        foreach($categories as $category)
        {
            foreach($category->posts as $category_post)
            {
                if ($post->id !== $category_post->id)
                {
                    in_array($category_post->id, $related_posts_id)? : array_push($related_posts_id, $category_post->id);
                }
            }
        }
        $related_posts = Post::whereIn('id', $related_posts_id)
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        return view('posts.show', compact('post', 'related_posts', 'author'));
    }
}
