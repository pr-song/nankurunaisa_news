<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function show($slug)
    {
        $post = Post::with('user')->whereSlug($slug)->firstOrFail();
        $post->page_views++;
        $post->save();
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

        return view('posts.show', compact('post', 'related_posts'));
    }

    public function upLike(Request $request)
    {
        $post = Post::whereSlug($request->slug)->firstOrFail();
        $post->incrLike();
        $post->save();

        return response()->json([
            'likes_count' => $post->likes_count
        ]);
    }
}
