@extends('layout.main')

@section('halaman') 
  <h1 class="mb-4 text-center mb-3">{{ $title }}</h1> 

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/blog"> 
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('authors'))
          <input type="hidden" name="authors" value="{{ request('authors') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="sumbit">Search</button>
        </div>
      </form>
    </div>
  </div>

  @if($postinganblog->count())
  <div class="card mb-3">
    
    @if ($postinganblog[0]->image)
      <div style="max-height: 350px; overflow: hidden;">
        <img src="{{ $postinganblog[0]->image }}" class="card-img-top" alt="...">
      </div>
    @else
      <img src="https://source.unsplash.com/1200x400/?{{ $postinganblog[0]->kategori->nama }}" class="card-img-top" alt="...">
    @endif
    
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/blog/{{ $postinganblog[0]->slug }}" class="text-decoration-none text-dark">{{ $postinganblog[0]->judul }}</a></h3>
      <p>
        <small class="text-muted">
          By. <a href="/blog?authors={{ $postinganblog[0]->user->username }}" class="text-decoration-none">{{ $postinganblog[0]->user->name }}</a> in <a href="/blog?category={{ $postinganblog[0]->kategori->slug }}" class="text-decoration-none">{{ $postinganblog[0]->kategori->nama }}</a> {{ $postinganblog[0]->created_at->diffForHumans() }}
        </small>
      </p>
      <p class="card-text">{{ $postinganblog[0]->isi }}</p> 
      <a href="/blog/{{ $postinganblog[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
  </div>

  <div class="container">
    <div class="row">
      @foreach ($postinganblog->skip(1) as $post)  
      <div class="col-md-6 mb-3">
        <div class="card"> 
          <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)">
            <a href="/blog?category={{ $post->kategori->slug }}" class="text-white text-decoration-none">
              {{ $post->kategori->nama }} 
            </a>
          </div>

          @if ($post->image)
            <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->kategori->nama }}">
          @else
            <img src="https://source.unsplash.com/400x300/?{{ $post->kategori->nama }}" class="card-img-top" alt="{{ $post->kategori->nama }}">
          @endif
          
          <div class="card-body">
            <h5 class="card-title">{{ $post->judul }}</h5>
            <p> 
              <small class="text-muted">
                By. <a href="/blog?authors={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}
              </small> 
            </p>
            <p class="card-text">{{ $post->isi }}</p>  
            <a href="/blog/{{ $post->slug }}" class="btn btn-primary">Read more</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div> 

  @else 
    <p class="text-center fs-4">Tidak Ada Postingan</p>
  @endif 

  <div class="d-flex justify-content-center">
    {{ $postinganblog->links() }}
  </div>

@endsection