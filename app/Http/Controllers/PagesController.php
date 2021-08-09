<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use App\Models\Category;
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
        $archive = Post::selectRaw('year(published_at) year')
                    ->selectRaw('monthname(published_at) month')
                    ->selectRaw('count(*) posts')
                    ->groupBy('year', 'month')
                    ->orderBy('year', 'DESC')
                    ->get();

        return view('pages.archive', [
            'authors' => User::take(4)->get(),
            'categories' => Category::all(),
            'posts' => Post::latest()->take(10)->get(),
            'archive' => $archive
        ]);
    }
}
