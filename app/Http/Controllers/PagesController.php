<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function home()
    {
         // $posts = App\Models\Post::all();
        $posts = Post::published()->paginate(1);

        return view('pages.home', compact('posts')); //['posts' => $posts]
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        return view('pages.archive');
    }
}
