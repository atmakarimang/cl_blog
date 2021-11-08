@extends('layout.main')

@section('halaman')
    <h1>Halaman About</h1> 
    <div class="card mt-4 mb-4 shadow">   
        <div class="row g-0">
          <div class="col-md-4"> 
            <img src="img/{{ $img }}" alt="{{ $name }}" class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title text-center">{{ $name }}</h3> 
              <p class="card-text" style="text-align: justify">Sebuah blog yg dibuat oleh Atma Karimang, Blog ini dibuat menggunakan framework laravel dan bootstrap sebagai penghias tiap halaman nya, memiliki konsep seperti blog tetapi semua bisa menjadi author atau penulis, blog ini masih dalam proses pengembangan kembali, karena ada beberapa fitur yang masih belum tepat guna, dan belum bisa dijalankan, Terima kasih sudah mengunjungi blog sederhana ini :)</p>  
            </div>
          </div>
        </div>
    </div> 
@endsection 