@extends('layout.main')

@section('container')

<h2 class="text-center mb-3">{{ $title; }}</h2>

<div class="row justify-content-center mb-2">
  <div class="col-md-6">
    <form action="/post">
      @if(request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
      @endif

      @if(request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">
     @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search..">
        <button class="input-group-text btn btn-primary" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($post->count())
<div class="card mb-3 ">

  @if ($post[0]->image)
  <img src="{{ asset('storage/' . $post[0]->image) }}" alt="{{ $post[0]->category->name }}" class="img-fluid"> 
  @else
  <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="card-img-top" alt="...">
  @endif



    <div class="card-body text-center">
      <h3 class="card-title"><a href="/post/{{ $post[0]->slug }}" class="text-dark text-decoration-none">{{ $post[0]->title }}</a></h3>

      <p><small class="text-muted">By : <a href="/post?author={{ $post[0]->author->username }}" class="text-decoration-none">{{ $post[0]->author->name }}</a> in <a href="/post?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a>
        {{ $post[0]->created_at->diffForHumans() }}
      </small>
    </p>
      <p>{{ $post[0]->excerpt }}</p>

      <p class="card-text">{{ $post[0]->excerpt }}</p>

      <a href="/post/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary btn-sm">Read More ...</a>
      
    </div>
  </div>

 <div class="container">
    <div class="row">

        @foreach($post->skip(1) as $posts)

        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2 m-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/categories/{{ $posts->category->slug }}" class=" text-white text-decoration-none">{{ $posts->category->name }}</a>{{ $posts->category->name }}</div>

                @if ($posts->image)
                <img src="{{ asset('storage/' . $posts->image) }}" class="card-img-top" alt="{{ $posts->category->name }}">
                @else
                <img src="https://source.unsplash.com/500x400?{{ $posts->category->name }}" class="card-img-top" alt="{{ $posts->category->name }}">  
                @endif

                <div class="card-body">
                  <h5 class="card-title">{{ $posts->title }}</h5>
                  <p><small class="text-muted">By : <a href="/post?author={{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name }}</a> in <a href="/post?category={{ $posts->category->slug }}" class="text-decoration-none">{{ $posts->category->name }}</a>
                    {{ $post[0]->created_at->diffForHumans() }}
                  </small>
                </p>
                  <p class="card-text">{{ $posts->excerpt }}</p>
                  <a href="/post/{{ $posts->slug }}" class="btn btn-primary">Read More...</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
 </div>

 @else
<p class="text-center fs-4">No Post</p>
  @endif

  {{ $post->links() }}

@endSection