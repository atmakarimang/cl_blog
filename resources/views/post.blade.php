@extends('layout.main')

@section('halaman')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post["judul"] }}</h2> 
                <p>By. <a href="/blog?authors={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->nama }}</a></p>
                <!--p>{{ $post["body"] }}</p-->

                @if ($post->image)
                <div style="max-height: 350px; overflow: hidden;"> 
                    <img src="{{ $post->image }}" alt="{{ $post->kategori->nama }}" class="img-fluid">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400/?{{ $post->kategori->nama }}" alt="{{ $post->kategori->nama }}" class="img-fluid">
                @endif
                
                <article class="my-3 fs-7" style="text-align: justify">
                    {!! $post["body"] !!}
                </article> 
                
                <a href="/blog" class="text-decoration-none d-block mt-3">Back To Blog</a>
            </div>
        </div>
    </div>

@endsection