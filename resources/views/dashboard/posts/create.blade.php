@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/dashboard/posts">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title') }}">          
              @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>     
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" disable readonly value="{{ old('slug') }}">  
              @error('slug')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror        
            </div>     
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" aria-label="Default select example" name="category_id">                                
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
                <label for="exampleFormControlTextarea1" class="form-label" for="body">Body</label>         
                <textarea class="form-control @error('body') is-invalid @enderror" id="exampleFormControlTextarea1" rows="15" name="body">{{ old('body') }}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>        
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>

    {{-- slug otomatis --}}
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/cekSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
    </script>
@endsection