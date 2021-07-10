<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Str;
use Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('pages.dashboard.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'kategori' => 'required',
            'isi' => 'required',
            'author' => 'required',
            'gambar' => 'image',
        ]);

        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('blog','public');
        $data['slug'] = Str::slug($request->title);
        Blog::create($data);
        return redirect()->back()->with('status','Blog Terlah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.dashboard.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'isi' => 'required',
            'title' => 'required',
            'gambar' => 'image|nullable',
            'author' => 'required',
            'kategori' => 'required',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->isi = $request->isi;
        $blog->title = $request->title;
        $blog->kategori = $request->kategori;
        $blog->author = $request->author;
        $blog->slug = Str::slug($request->title);
        if($request->hasFile('gambar')){
            if($request->gambar && file_exists(storage_path('app/public/'.$request->gambar))){
                Storage::delete('public/'.$request->gambar);
            }
            $file = $request->file('gambar')->store('gambars','public');
            $blog->gambar = $file;
        } 
        $blog->save();
        return redirect()->back()->with('status','Blog  Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('status','Blog Berhasil Dihapus');
    }
}
