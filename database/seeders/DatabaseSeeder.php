<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // to prevent duplication
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'person'
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $family->id,
            'title' => 'My family post',
            'slug' => 'my-family-post',
            'excerpt' => 'lorem ipsum dolar sit amet',
            'body' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet malesuada odio, eu sollicitudin ex molestie sit amet. Sed hendrerit finibus velit vel auctor. Donec ornare erat ut sapien pellentesque molestie. Nulla id mattis nibh, sed rhoncus erat. Aliquam pretium ultricies dui ac commodo. Aenean et sem luctus sapien faucibus porttitor eu nec elit. Proin non odio nec velit sodales lobortis quis nec ante. Aliquam mattis mattis ultricies. Mauris eros odio, mattis in ipsum nec, aliquam vehicula purus. Aenean rhoncus diam ex, in mattis felis euismod nec. Suspendisse ullamcorper bibendum molestie. Suspendisse suscipit purus sit amet augue venenatis, non vestibulum mi viverra. Praesent sit amet ex sodales, dictum eros ut, malesuada metus. </p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My work post',
            'slug' => 'my-work-post',
            'excerpt' => 'lorem ipsum dolar sit amet',
            'body' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet malesuada odio, eu sollicitudin ex molestie sit amet. Sed hendrerit finibus velit vel auctor. Donec ornare erat ut sapien pellentesque molestie. Nulla id mattis nibh, sed rhoncus erat. Aliquam pretium ultricies dui ac commodo. Aenean et sem luctus sapien faucibus porttitor eu nec elit. Proin non odio nec velit sodales lobortis quis nec ante. Aliquam mattis mattis ultricies. Mauris eros odio, mattis in ipsum nec, aliquam vehicula purus. Aenean rhoncus diam ex, in mattis felis euismod nec. Suspendisse ullamcorper bibendum molestie. Suspendisse suscipit purus sit amet augue venenatis, non vestibulum mi viverra. Praesent sit amet ex sodales, dictum eros ut, malesuada metus. </p>'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $personal->id,
            'title' => 'My personal post',
            'slug' => 'my-personal-post',
            'excerpt' => 'lorem ipsum dolar sit amet',
            'body' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus aliquet malesuada odio, eu sollicitudin ex molestie sit amet. Sed hendrerit finibus velit vel auctor. Donec ornare erat ut sapien pellentesque molestie. Nulla id mattis nibh, sed rhoncus erat. Aliquam pretium ultricies dui ac commodo. Aenean et sem luctus sapien faucibus porttitor eu nec elit. Proin non odio nec velit sodales lobortis quis nec ante. Aliquam mattis mattis ultricies. Mauris eros odio, mattis in ipsum nec, aliquam vehicula purus. Aenean rhoncus diam ex, in mattis felis euismod nec. Suspendisse ullamcorper bibendum molestie. Suspendisse suscipit purus sit amet augue venenatis, non vestibulum mi viverra. Praesent sit amet ex sodales, dictum eros ut, malesuada metus. </p>'
        ]);
    }
}
