@extends('layout.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration w-100 m-auto">
            
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="register" method="post">

                  @csrf
              
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @endError" value="{{ old('name') }}"  id="name" placeholder="Name">
                    <label for="name">Name</label>
                    @error('name')
                    <div class="invalid-feedback mb-3">
                     {{$message}}
                    </div>
                    @endError
                  </div>
                  <div class="form-floating">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @endError" value="{{ old('username') }}" id="usernamae" placeholder="Username">
                    <label for="usernamae">Username</label>
                    @error('username')
                    <div class="invalid-feedback mb-3">
                      {{ $message }}
                    {{-- Priense Username --}}
                    </div>
                    @endError
                  </div>
                  <div class="form-floating">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @endError" value="{{ old('email') }}" id="usernamae" placeholder="Email">
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback mb-3">
                    {{ $message }}
                    </div>
                    @endError
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom  @error('password') is-invalid @endError" id="floatingPassword" value="{{ old('password') }}" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback mb-3">
                    {{ $message }}
                    </div>
                    @endError
                  </div>

                  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block mt-3">Has Account? <a href="/login" class="text-decoration-none">Login Now</a></small>
              </main>

        </div>
    </div>
</div>

@endSection