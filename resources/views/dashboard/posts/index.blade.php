@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mys Posts</h1>

  </div>

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/posts/create" class="btn btn-primary btn-sm mb">Create New Post</a>
    <table class="table table-striped table-sm ">
      <thead>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategory</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
                <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-primary"><i class="bi bi-pencil-fill"></i></a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0"> <i class="bi bi-trash2-fill" onclick="return confirm('Are you sure?')"></i></button>
                </form>
            </td>
          </tr> 
        @endforeach
        
      </tbody>
    </table>
  </div>
    
@endsection


