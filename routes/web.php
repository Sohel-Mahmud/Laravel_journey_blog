<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

/// $slug = post catches the url peram and passes to the function
Route::get('posts/{post:slug}', [PostController::class, 'show']); //post is the wildcard

Route::get('categories/{category:slug}', function (Category $category){
    return view('posts',[
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all(),

        // eager load(['']) to reduce db query on loop
        // 'posts' => $category->posts->load([''])
    ]);
})->name('category');

Route::get('authors/{author:id}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()

    ]);
})->name('author');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
