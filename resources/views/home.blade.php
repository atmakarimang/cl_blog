@extends('layout.main')

@section('halaman')

    <div class="container">
        <div class="row">
            
        @foreach ($dnews['data']['posts'] as $news)  
        <div class="col-md-4 mb-3">
            <div class="card"> 

            <img src="{{ $news['thumbnail'] }}" class="card-img-top">
            
            <div class="card-body">
                <h5 class="card-title">{{ $news['title'] }}</h5>
                <p> 
                <small class="text-muted">
                    
                </small> 
                </p>
                <p class="card-text">{{ $news['description'] }}</p>  
                <a href="{{ $news['link'] }}" target="_blank" class="btn btn-primary">Read more</a>
            </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    
    <div class="d-flex justify-content-center">
    </div>

@endsection