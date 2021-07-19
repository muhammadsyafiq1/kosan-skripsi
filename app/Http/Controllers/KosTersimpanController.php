<?php

namespace App\Http\Controllers;

use App\Models\Kos_tersimpan;
use Illuminate\Http\Request;
use Auth;

class KosTersimpanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		$kos = Kos_tersimpan::where('user_id', Auth::user()->id)->get(); 
        return view('pages.dashboard.favorit.index', compact('kos'));
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
        Kos_tersimpan::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kos_tersimpan  $kos_tersimpan
     * @return \Illuminate\Http\Response
     */
    public function show(Kos_tersimpan $kos_tersimpan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kos_tersimpan  $kos_tersimpan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kos_tersimpan $kos_tersimpan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kos_tersimpan  $kos_tersimpan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kos_tersimpan $kos_tersimpan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kos_tersimpan  $kos_tersimpan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Kos_tersimpan::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('status','Kos Favorit Berhasl Dihapus');
    }
}
