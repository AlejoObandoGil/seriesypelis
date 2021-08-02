<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // $posts = Post::where('user_id', auth()->id())->get();
        // $posts = auth()->user()->posts;

        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);
        // validamos
        $this->validate($request, ['title' => 'required|min:1']);
        // creamos - devuelve array solo la con llave title y su valor ingresado
        $post = Post::create($request->all());
        // retornamos
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('view', $post);

        return view('admin.posts.edit', [
                'post' => $post,
                'tags' => Tag::all(),
                'categories' => Category::all(),
        ]);
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);
        // $post->update($request->except('tags'));
        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', 'Nueva Publicación actualizada!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash', 'Publicación Eliminada!');
    }
}

    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();

    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }
