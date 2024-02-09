@extends('dashboard.layouts.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create  New  Post</h1>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-lg-8">
            <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @endError" value="{{ old('title') }}" name="title" id="title" required autofocus>
                  @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @endError
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @endError" value="{{ old('slug') }}" name="slug" id="slug" required>
                    @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @endError
                  </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)

                        @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif

                        @endforeach
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="image" class="form-label">Post Image</label>
                    @error('image')
                    <div class="invalid-feedback">
                      {{ $message }}
                      
                    </div>
                    @endError
                    <input class="form-control @error('image') is-invalid @endError" name="image" type="file" id="image" onchange="previewImage()">
                    <img class="img-preview img-fluid mt-3 col-sm-5">
                  </div>
                </div>

                <div class="mb-3">
                  
                    <label for="body" class="form-label">Body</label>
                    @error('body')
                  <p class="text-danger">{{ $message }}</p>
                  @endError
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                  </div>

                <div>
                  <button type="submit" class="btn btn-primary mb-5">Create Post</button>
                </div>
              </form>
        </div>
    </div>
  </div>
  
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-eccept', function(e){
        e.preventDefault()
    })

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const ofReader = new FileReader();
      ofReader.readAsDataURL(image.files[0]);
      ofReader.onload = function(ofREvent){
        imgPreview.src = ofREvent.target.result;
      }
    }

</script>

@endsection