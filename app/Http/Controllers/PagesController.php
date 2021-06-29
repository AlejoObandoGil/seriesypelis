<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function home()
    {
         // $posts = App\Models\Post::all();
        $posts = Post::latest('published_at')->get();

        return view('welcome', compact('posts')); //['posts' => $posts]
    }
}
