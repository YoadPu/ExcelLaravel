@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  @if (session()->has('succes'))      
      <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
        {{ session('succes') }}    
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif

  <div class="table-responsive small col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3 mt-3">Create new post</a>
    <a href="/exportexcel" class="btn btn-danger mb-3 mt-3">Export</a>
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Import Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="/importexcel" method="POST" enctype="multipart/form-data">
            @csrf   
          <div class="modal-body"> 
            <div class="form-body">
              <div class="form-group">
                <input type="file" name="file" required>
              </div>
            </div>                    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>
      </div>
    </div>
    
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Slug</th>          
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->slug }}</td>    
                <td>
                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <a href="" class="badge bg-danger"><span data-feather="x-circle"></span></a>
                </td>            
            </tr> 
        @endforeach    
      </tbody>
    </table>
  </div>
@endsection