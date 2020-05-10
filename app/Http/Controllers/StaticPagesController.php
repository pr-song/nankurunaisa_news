<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class StaticPagesController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();

        return view('home', compact('posts'));
    }

    public function about()
    {
        return view('static_pages.about');
    }

    public function contact()
    {
        return view('static_pages.contact');
    }
}
