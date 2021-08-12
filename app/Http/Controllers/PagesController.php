<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function spa()
    {
        return view('pages.spa');
    }

    public function home()
    {
        $query = Post::published();

        if(request('year'))
            {
                $query->whereYear('published_at', request('year'));
            }

         // $posts = App\Models\Post::all();
        $posts = $query->paginate();

        if ( request()->wantsJson())
        {
            return $posts;
        }

        return view('pages.home', compact('posts')); //['posts' => $posts]
    }

    public function about()
    {
        return view('pages.about');
    }

    public function archive()
    {
        $archive = Post::selectRaw('year(published_at) year')
                    ->selectRaw('monthname(published_at) monthname')
                    ->selectRaw('month(published_at) month')
                    ->selectRaw('count(*) posts')
                    ->groupBy('year', 'monthname', 'month')
                    ->orderBy('year')
                    ->get();
        // $archive = Post::byYearAndMonth()->get();

        return view('pages.archive', [
            'authors' => User::take(4)->get(),
            'categories' => Category::all(),
            'posts' => Post::latest('published_at')->take(10)->get(),
            'archive' => $archive
        ]);
    }
}
