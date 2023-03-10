<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class, 'index'])->name('home');

/// $slug = post catches the url peram and passes to the function
Route::get('posts/{post:slug}', [PostController::class, 'show']); //post is the wildcard

/// category can be done like this
Route::get('categories/{category:slug}', function (Category $category){
    return view('posts',[
        'posts' => $category->posts,

        // eager   load(['']) to reduce db query on loop
        // 'posts' => $category->posts->load([''])
    ]);
})->name('category');

Route::get('author/{author:username}', function (User $author) {

    return view('posts.index', [
        'posts' => $author->posts,

    ]);
})->name('author');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
