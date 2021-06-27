<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $posts = App\Models\Post::all();
    $posts = App\Models\Post::latest('published_at')->get();

    return view('welcome', compact('posts')); //['posts' => $posts]
});

Route::get('admin', function () {
    return view('admin.dashboard');
});

Route::get('/posts', function () {
    return App\Models\Post::all();
});
