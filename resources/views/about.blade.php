@extends('layout.main')

@section('halaman')
    <h1>Halaman About</h1> 
    <div class="card mt-4 mb-4 shadow bg-danger text-white" style="max-width: 640px;">  
        <div class="row g-0">
          <div class="col-md-4"> 
            <img src="img/{{ $img }}" alt="{{ $name }}" class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title">{{ $name }}</h3>
              <p class="card-text">Lulusan Teknik Informatika STIKI Malang, Domisili Kota Malang, Interest di bidang Pemograman, Terutama di web development. Sekarang saya sedang mendalami laravel, NodeJS, dan React</p> 
              <p>Email Saya : {{ $email }}</p>   
            </div>
          </div>
        </div>
    </div> 
@endsection 