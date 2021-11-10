<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Postingan;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Postingan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:postingans',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-image');
        }

        $validateData['judul'] = $request->title;
        $validateData['kategori_id'] = $request->category_id;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['author'] = auth()->user()->name;
        $validateData['isi'] = Str::limit(strip_tags($request->body), 150);

        Postingan::create($validateData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show(Postingan $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Postingan $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postingan $post)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'slug' => "required|unique:postingans,slug,$post->id",
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        unset($validateData['title']);
        unset($validateData['category_id']);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-image');
        }

        $validateData['judul'] = $request->title;
        $validateData['kategori_id'] = $request->category_id;
        $validateData['user_id'] = auth()->user()->id;
        $validateData['author'] = auth()->user()->name;
        $validateData['isi'] = Str::limit(strip_tags($request->body), 150);

        Postingan::where('id', $post->id)->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'New post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postingan $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Postingan::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'New post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Postingan::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
