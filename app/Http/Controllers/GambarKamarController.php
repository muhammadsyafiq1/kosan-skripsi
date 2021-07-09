<?php

namespace App\Http\Controllers;

use App\Models\gambar_kamar;
use Illuminate\Http\Request;
use App\Models\Kamar;

class GambarKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function createGalleryKamar($id)
    {
        $kamar = Kamar::with('kos')->findOrFail($id);
        return view('pages.dashboard.kamar.create-gallery', compact('kamar'));
    }

    public function deleteGalleryKamar ($id)
    {
        $gambar_kamar = Gambar_kamar::findOrFail($id);
        $gambar_kamar->delete();
        return redirect()->back()->with('status','Gambar Kamar Berhasil Dihapus');
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
            'gambar' => 'required|image'
        ]);
        $data = $request->all(); 
        $data['gambar'] = $request->file('gambar')->store('gallery-kamar','public');
        Gambar_kamar::create($data);

        return redirect()->back()->with('status','Gambar kamar berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gambar_kamar  $gambar_kamar
     * @return \Illuminate\Http\Response
     */
    public function show(gambar_kamar $gambar_kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gambar_kamar  $gambar_kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(gambar_kamar $gambar_kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gambar_kamar  $gambar_kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gambar_kamar $gambar_kamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gambar_kamar  $gambar_kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(gambar_kamar $gambar_kamar)
    {
        //
    }
}
