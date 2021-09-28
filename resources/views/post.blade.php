@extends('layout.main')

@section('halaman')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post["judul"] }}</h2> 
                <p>By. <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/kategori/{{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->nama }}</a></p>
                <!--p>{{ $post["body"] }}</p-->
                <img src="https://source.unsplash.com/1200x400/?{{ $post->kategori->nama }}" alt="{{ $post->kategori->nama }}" class="img-fluid">
                
                <article class="my-3 fs-7">
                    {!! $post["body"] !!}
                </article>
                
                <a href="/blog" class="text-decoration-none d-block mt-3">Kembali Ke Blog</a>
            </div>
        </div>
    </div>

@endsection