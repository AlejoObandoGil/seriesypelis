<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }
    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();

    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }

    public function store(Request $request)
    {
        // validamos
        $this->validate($request, ['title' => 'required']);
        // creamos - devuelve array solo la con llave title y su valor ingresado
        $post = Post::create($request->only('title'));
        // retornamos
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, Request $request)
    {
        // dd($request->get('tags'));

        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'body'=>'required',
            'category'=>'required'
        ]);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->published_at = Carbon::parse($request->published_at);
        $post->iframe = $request->iframe;
        $post->category_id = $request->get('category');
        $post->save();

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Nueva Publicación actualizada!');
    }
}
