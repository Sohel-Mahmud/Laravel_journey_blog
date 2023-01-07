<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->get(),
          /**
         * get all post with respective category, this removes the n+1 problem,
         * UPDATE: its now done on model so no need here
         * Update: category is passed by CategoryDropdown Component
         */
            //'posts' => Post::latest()->with('category', 'author')->get()
        ]);
    }


    public function show(Post $post)
    {
        /// find a post by its slug and pass it ot a view called 'post'

        //can be inlined
        //$post = Post::find($slug);

        return view('posts.show', [
            'post' => $post
        ]);

        /* //$path = __DIR__ . "/../resources/posts/{$slug}.html";

    if( !file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")){
        //die and dump
        //dd('file not exists');
        // die dump and debug
        //ddd('file not exists');

        abort(404);

        //redirect or home
        //return redirect('/');

    }

    //caching
    $post = cache() -> remember("posts.{$slug}", 5, function () use ($path) {
        var_dump("called by cache");
        return file_get_contents($path);
    });

    //$post = file_get_contents($path);

    return view('post', [
        'post'=> $post
    ]); */
    }
}
