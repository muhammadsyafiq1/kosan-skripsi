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
        // pemilik kos
        $kosan = Kos::with('kamar')->where('user_id', Auth::user()->id)->paginate(9); 
        return view('pages.dashboard.kos.index', compact('kosan'));
    }

    public function tableKos()
    {
        $kosan = Kos::all();
        return view('pages.dashboard.admin.kos.index', compact('kosan'));
    }

    public function aktifkan ($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->status = 'aktifkan';
        $kos->save();

        return  redirect()->back()->with('status','Kos Berhasil Diaktifkan');
    }

    public function nonaktifkan ($id)
    {
        $kos = Kos::findOrFail($id);
        $kos->status = 'nonaktifkan';
        $kos->save();

        return  redirect()->back()->with('status','Kos Berhasil Dinonaktifkan');
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
            'biaya_booking' => 'max:17'
        ]);

        $kos = new Kos;
        $kos->is_booking = $request->is_booking;
        $kos->biaya_booking = $request->biaya_booking;
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

        return redirect(route('createGallery',$kos->id))->with('status','Harap Tambahkan Foto Kos.');
    }

    public function createGallery($id)
    {
        $kos = Kos::with('gallery')->where('id', $id)->firstOrFail(); 
        return view('pages.dashboard.kos.create-gallery', compact('kos'));
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
    public function edit($id)
    {
        $kos = Kos::findOrFail($id);
        return view('pages.dashboard.kos.edit', compact('kos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kos  $kos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kos' => 'required',
            'alamat' => 'required',
            'type_kos' => 'required',
            'aturan_kos' => 'required',
            'deskripsi_kos' => 'required',
            'luas_kos' => 'nullable',

        ]);

        $kos =  Kos::findOrFail($id);
        $kos->nama_kos = $request->nama_kos;
        $kos->alamat = $request->alamat;
        $kos->type_kos = $request->type_kos;
        $kos->aturan_kos = $request->aturan_kos;
        $kos->deskripsi_kos = $request->deskripsi_kos;
        $kos->luas_kos = $request->luas_kos;

        // $kos->biaya_supir = $request->biaya_supir;

        $kos->user_id = Auth::user()->id;
        $kos->slug = Str::slug($request->nama_kos);
        $kos->save();
        $kos->fasilitas()->sync($request->fasilitas);

        return redirect()->back()->with('status','Kos Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kos  $kos
     * @return \Illuminate\Http\Response
     */
    public function deleteKos($id)
    {
        $data = Kos::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('status','Kos Berhasil Dihapus');
    }
}
