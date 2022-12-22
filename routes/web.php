<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


    /// using array_map
    /*$posts = array_map(function ($file){

        $document = YamlFrontMatter::parseFile($file);

        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug,
        );
    }, $files);*/

    //ddd($posts);

    return view('posts', [
        'posts' => Post::latest()->get()
        //get all post with respective category, this removes the n+1 problem
        //'posts' => Post::latest()->with('category', 'author')->get()
    ]);
});

/// $slug = post catches the url peram and passes to the function
Route::get('posts/{post:slug}', function (Post $post) {     // Post::where('slug', $post)->firstOrFail()

    /// find a post by its slug and pass it ot a view called 'post'

    //can be inlined
    //$post = Post::find($slug);

    return view('post', [
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
}); //post is the wildcard

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts',[
        'posts' => $category->posts
        //eager load(['']) to reduce db query on loop
        // 'posts' => $category->posts->load([''])
    ]);
});

Route::get('authors/{author:id}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
