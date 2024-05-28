@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-6">

    @if (session()->has('succes'))            
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('succes') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('loginError'))            
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    <main class="form-signin w-100 m-auto">
      <form action="/login" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
    
        <div class="form-floating mb-1">
          <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="emial" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
          <label for="floatingInput">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>              
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>      
      </form>
      <small class="d-block text-center mt-3">Not Register? <a href="/register">Registrasi now</a></small>
    </main>
  </div>
</div>  
@endsection