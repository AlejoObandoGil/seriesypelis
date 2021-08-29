<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post, $season="", $chapter="")
    {
        // $videos = Video::all();
        if ($post->isPublished() || auth()->check())
        {
            return view('posts.show', compact('post', 'season', 'chapter'));
        }

        abort(404);
    }
}
