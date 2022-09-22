<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $dNews = Http::get('https://api-berita-indonesia.vercel.app/cnn/olahraga')->json();
    return view('home', [
        "title" => "Home",
        "active" => "Home",
        "dnews" => $dNews
    ]);
});

Route::get('/about', function () {
    //return 'Halaman About';
    //return view('about');
    return view('about', [
        "title" => "About",
        "active" => "About",
        "name" => "ATMA BLOG",
        "email" => "atmakarimang@gmail.com",
        "img" => "logo.png"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);

// Halaman Single Post
//Route::get('blog/{slug}', [PostController::class, 'show']);
Route::get('blog/{post:slug}', [PostController::class, 'show']);

Route::get('/kategori', function () {
    return view('kategoriall', [
        'title' => 'Kategori',
        'active' => 'Kategori',
        'kategoriall' => Kategori::all()
    ]);
});

Route::get('/klasemenepl', [KlasemenController::class, 'index']);

/*
Route::get('/kategori/{kategori:slug}', function (Kategori $kategori) {
    return view('blog', [
        'title' => "Kategori Postingan : $kategori->nama",
        'active' => 'Kategori',
        //'posts' => $kategori->postingan
        'postinganblog' => $kategori->postingan
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('blog', [
        'title' => "Diposting Oleh : $author->name",
        'postinganblog' => $author->postingan->load('kategori', 'user')
    ]);
});
*/

//Login & Register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

//Logout
Route::post('/logout', [LoginController::class, 'logout']);

//Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('auth');
