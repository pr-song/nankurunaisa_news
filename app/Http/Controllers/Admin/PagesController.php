<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

class PagesController extends Controller
{
    public function home()
    {
        $total_posts = Post::count();
        $total_users = User::count();
        return view('manager.static_pages.dashboard', compact('total_posts', 'total_users'));
    }
}
