{{--@extends('layout')

@section('content')
    @foreach ($posts as $post)

        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a>

            </h1>
            <p>
                By <a href="/authors/{{$post->author->id}}">{{ $post->author->name }}</a> in <a href="/categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
            </p>
            <div>
                {{ $post->excerpt }}

            </div>

        </article>

    @endforeach
@endsection--}}

<x-layout>

    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card :post="$posts[0]"/>

        <div class="lg:grid lg:grid-cols-2">

                <x-post-card :value="1243"/>

        </div>


    </main>
</x-layout>
