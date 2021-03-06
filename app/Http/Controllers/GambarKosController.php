<?php

namespace App\Http\Controllers;

use App\Models\Gambar_kos;
use Illuminate\Http\Request;

class GambarKosController extends Controller
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
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->store('gambar_kos','public');
        Gambar_kos::create($data);
        return redirect()->back()->with('status','Gambar Kos Berhasil Ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gambar_kos  $gambar_kos
     * @return \Illuminate\Http\Response
     */
    public function show(Gambar_kos $gambar_kos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gambar_kos  $gambar_kos
     * @return \Illuminate\Http\Response
     */
    public function edit(Gambar_kos $gambar_kos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gambar_kos  $gambar_kos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gambar_kos $gambar_kos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gambar_kos  $gambar_kos
     * @return \Illuminate\Http\Response
     */
    public function deleteGalery($id)
    {
        $data = Gambar_kos::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('status','Gambar Kos Berhasil Dihapus');
    }
}
