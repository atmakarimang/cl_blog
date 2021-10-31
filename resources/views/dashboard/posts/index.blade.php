@extends('dashboard.layout.main')

@section('halaman')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome Again, {{ auth()->user()->name }}</h1>
    </div> 

    @if (session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive col-lg-8 mb-5">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
        <table class="table table-sm">
          <thead> 
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th> 
              <th scope="col">Action</th> 
            </tr> 
          </thead>
          <tbody> 
            @foreach ($posts as $post)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->judul }}</td> 
                <td>{{ $post->kategori->nama }}</td>   
                <td class="d-flex flex-wrap-reverse">            
                    <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                      @method('delete') 
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure!')"><span data-feather="x-circle"></span></button>
                    </form> 
                </td>  
              </tr>
            @endforeach  
          </tbody>
        </table> 
    </div>

@endsection