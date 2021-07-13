<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\Fasilitas;

class KamarController extends Controller
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
        // dd($request->all()); die;
        $request->validate([
            'biaya_perbulan' => 'required',
        ]);

        $kamar = new Kamar;
        $kamar->status = 'tersedia';
        $kamar->kos_id = $request->kos_id;
        $kamar->luas_kamar = $request->luas_kamar;
        $kamar->ukuran_kamar = $request->ukuran_kamar;
        $kamar->jumlah_kasur = $request->jumlah_kasur;
        $kamar->biaya_perbulan = $request->biaya_perbulan;
        $kamar->save();
        $kamar->fasilitas()->attach($request->fasilitas);

        return redirect()->back()->with('status','Kamar Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->back()->with('status','Kamar Berhasil Dihapus');
    }
}
