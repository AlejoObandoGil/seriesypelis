<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return view('pages.home', [
            'title' => "Películas & Series / HashTag / #$tag->name",
            'posts' => $tag->posts()->published()->paginate()
            ]);
    }
}
