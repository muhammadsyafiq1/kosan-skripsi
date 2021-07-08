<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Auth;
use Str;

class KosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kosan = Kos::where('user_id', Auth::user()->id)->get();
        return view('pages.dashboard.kos.index', compact('kosan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.kos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); die;
        $request->validate([
            'nama_kos' => 'required|max:50|min:3',
            'deskripsi_kos' => 'required',
            'type_kos' => 'required',
            'aturan_kos' => 'required',
        ]);

        $kos = new Kos;
        $kos->nama_kos = $request->nama_kos;
        $kos->alamat = $request->alamat;
        $kos->deskripsi_kos = $request->deskripsi_kos;
        $kos->type_kos = $request->type_kos;
        $kos->luas_kos = $request->luas_kos;
        $kos->aturan_kos = $request->aturan_kos;
        $kos->user_id = Auth::user()->id;
        $kos->slug = Str::slug($request->nama_kos);
        $kos->save();
        $kos->fasilitas()->attach($request->fasilitas);

        return redirect(route('createGallery',$kos->id))->with('status','Harap Tambahkan Foto Mobil.');
    }

    public function createGallery($id)
    {
        $kos = Kos::with('gallery')->where('id', $id)->firstOrFail(); dd($kos); die;
        // return view('dashboard.gallery.create', compact('cars'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kos  $kos
     * @return \Illuminate\Http\Response
     */
    public function show(Kos $kos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kos  $kos
     * @return \Illuminate\Http\Response
     */
    public function edit(Kos $kos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kos  $kos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kos $kos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kos  $kos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kos $kos)
    {
        //
    }
}
