<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // return $category->load('posts');
        return view('pages.home', [
            'title' => "Películas & Series / Género / $category->name",
            'posts' => $category->posts()->published()->paginate()
            ]);
    }
}
