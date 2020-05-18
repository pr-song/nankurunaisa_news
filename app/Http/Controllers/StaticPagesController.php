<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class StaticPagesController extends Controller
{
    public function home()
    {
        $sport = Category::with('posts')->where('name', 'Sport')->get();
        $business = Category::with('posts')->where('name', 'Business')->get();
        $travel = Category::with('posts')->where('name', 'Travel')->get();
        $education = Category::with('posts')->where('name', 'Education')->get();
        $game = Category::with('posts')->where('name', 'Game')->get();
        $trending_posts = Post::orderBy('page_views', 'desc')->limit(3)->get();
        $lated_posts = Post::orderBy('created_at', 'desc')->limit(5)->get();

        return view('home', compact('trending_posts', 'lated_posts','sport', 'business', 'travel', 'education', 'game'));
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
