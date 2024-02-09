@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>

  </div>

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="table-responsive col-lg-6">
    <a href="/dashboard/categories/create" class="btn btn-primary btn-sm mb">Create New Category</a>
    <table class="table table-striped table-sm ">
      <thead>
          <th scope="col">#</th>
          <th scope="col">Categories Name</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-primary"><i class="bi bi-pencil-fill"></i></a>
                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
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


