@extends('layout.main')
@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

                <h3>Judul : {{ $post->title }}</h3>
                <p>By : <a href="/post?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/post?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                @else
                <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif

                

                <article class="my-3 fs-5">
                    <p>{!! $post->body; !!}</p>
                </article>
            
            <a href="/blog" class="text-decoration-none">Back to Blog</a>

        </div>
    </div>
</div>



@endSection

