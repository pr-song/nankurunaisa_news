<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;

class PagesController extends Controller
{
    public function home()
    {
        $users = User::select('id', 'created_at')
            ->get()
            ->groupBy(function ($date)
            {
                return Carbon::parse($date->created_at)->format('m');
            });

        $usermcount = [];
        $userArr = [];

        foreach($users as $key => $value)
        {
            $usermcount[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++)
        {
            if (!empty($usermcount[$i]))
            {
                $userArr[$i] = $usermcount[$i];
            }
            else
            {
                $userArr[$i] = 0;
            }
        }

        $page_views = Post::select('page_views')->get();
        $total_page_views = 0;

        foreach($page_views as $value)
        {
            $total_page_views += $value->page_views;
        }

        $total_posts = Post::count();
        $total_users = User::count();
        return view('manager.static_pages.dashboard', compact('total_posts', 'total_users', 'total_page_views'));
    }
}
