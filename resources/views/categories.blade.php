@extends('layout.main')

@section('container')


<div class="container">
    <h2 class="mb-3">All Post Category </h2>
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4">
            <a href="/post?category={{ $category->slug }}">
            <div class="card text-bg-dark">
                <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                <div class="card-img-overlay">
                  <h5 class="card-title">{{ $category->name }}</h5>
                </div>
              </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endSection