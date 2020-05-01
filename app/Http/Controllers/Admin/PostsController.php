<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        return view('manager.posts.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $user_id = Auth::user()->id;
        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('title'), '-'),
            'user_id' => $user_id,
        ]);

        $post->save();
        $post->categories()->sync($request->get('categories'));

        return redirect(route('manager.new_post'))->with('status', 'Your post has been created!');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('manager.posts.index', compact('posts'));
    }
}
