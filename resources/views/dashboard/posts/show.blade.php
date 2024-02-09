@extends('dashboard.layouts.main')

@section('container')
    
<div class="container">
    <div class="row my-4">
        <div class="col-lg-8">

                <h3>Judul : {{ $post->title }}</h3>
                <a href="/dashboard/posts" class="text-decoration-none btn btn-success btn-sm my-3"> <i class="bi bi-skip-backward"></i> Back to Post</a>

                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none btn btn-primary btn-sm my-3"> <i class="bi bi-pencil-fill"></i> Edit</a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="text-decoration-none btn btn-danger btn-sm my-3" onclick="return confirm('Are you sure?')"><i class="bi bi-trash2-fill"></i> Delete</button>
                </form>

                {{-- <a href="/blog" class="text-decoration-none btn btn-danger btn-sm my-3"> <i class="bi bi-trash2-fill"></i> Delete</a> --}}

                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid"> 
                @else
                <img src="https://source.unsplash.com/1200x500?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid"> 
                @endif

                <article class="my-3 fs-5">
                    <p>{!! $post->body; !!}</p>
                </article>
            
            

        </div>
    </div>
</div>


@endsection