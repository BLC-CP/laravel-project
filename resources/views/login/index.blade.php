@extends('layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">

          @if (session()->has('success'))
              
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          @endif

          @if (session()->has('loginError'))
              
          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          @endif

            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/login" method="post">
                  @csrf
                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @endError" value="{{ old('email') }}" name="email" id="email" required placeholder="name@example.com" autofocus>
                    <label for="email">Email address</label>
                    @error('email')
                      <div class="invalid-feedback mb-3">
                        {{ $message }}
                      </div>
                    @endError
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @endError" value="{{ old('password') }}" name="password" required id="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @endError
                  </div>

                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block mt-3">Not Register? <a href="/register" class="text-decoration-none">Register Now</a></small>
              </main>

        </div>
    </div>
</div>

@endSection