@extends('layouts.main')

@section('container')
  <div class="row justify-content-center">
    <div class="col-md-6">
      <main class="form-signin w-100 m-auto">
        <form action="/register" method="POST">
          @csrf
          <h1 class="h3 mb-3 fw-normal text-center">Registrasi Form</h1>
      
          <div class="form-floating mb-1">
            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="name" id="name" required value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>                       
          <div class="form-floating mb-1">
            <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="floatingInput" placeholder="Username" id="username" required value="{{ old('username') }}">
            <label for="username">Username</label>
            @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>                       
          <div class="form-floating mb-1">
            <input type="email" name="email" class="form-control @error('email ')is-invalid @enderror" id="floatingInput" placeholder="Email address" id="email" required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>                       
          <div class="form-floating mb-1">
            <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="floatingInput" placeholder="Password" id="password" required>
            <label for="password">Password</label>
            @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>                       
          <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>      
        </form>
        <small class="d-block text-center mt-3">Not Register? <a href="/registrasi">Registrasi now</a></small>
      </main>
    </div>
  </div>  
@endsection
