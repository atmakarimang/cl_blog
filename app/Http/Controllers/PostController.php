<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';

        if (request('category')) {
            $category = Kategori::firstWhere('slug', request('category'));
            $title = ' di ' . $category->nama;
        }

        if (request('authors')) {
            $category = User::firstWhere('username', request('authors'));
            $title = ' dari ' . $category->name;
        }

        return view('blog', [
            "title" => "Semua Postingan " . $title,
            "active" => "Blog",
            //"postinganblog" => Postingan::all() 
            //"postinganblog" => Postingan::latest()->get() 
            //"postinganblog" => Postingan::with(['user', 'kategori'])->latest()->get()
            //"postinganblog" => Postingan::latest()->get() 
            //"postinganblog" => Postingan::latest()->Filter(request(['search', 'category', 'authors']))->get()
            "postinganblog" => Postingan::latest()->Filter(request(['search', 'category', 'authors']))
                ->paginate(5)->withQueryString()
        ]);
    }

    public function show(Postingan $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "Blog",
            "post"  => $post
        ]);
    }
}
