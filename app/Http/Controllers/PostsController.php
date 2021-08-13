<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// use App\Http\Resources\PostResource;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        if ($post->isPublished() || auth()->check())
        {
            // return new PostResource($post);
            $post->load('owner', 'category', 'tags', 'photos');

            if(request()->wantsJson())
            {
                return $post;
            }

            return view('posts.show', compact('post'));
        }

        abort(404);
    }
}
