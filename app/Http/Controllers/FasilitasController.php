<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Storage;
use App\Http\Requests\CreateFasilitasRequest;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('pages.dashboard.fasilitas.index', compact('fasilitas'));
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
    public function store(CreateFasilitasRequest $request)
    {
        
        $data = $request->all(); 
        if($request->icon){
            $data['icon'] = $request->file('icon')->store('icon','public');
            Fasilitas::create($data);
            return redirect()->back()->with('status','Fasilitas Berhasil Ditambah');
        }else{
            Fasilitas::create($data);
            return redirect()->back()->with('status','Fasilitas Berhasil Ditambah');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('pages.dashboard.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all()); die;
        $request->validate([
            'icon' => 'nullable|image',
            'nama_fasilitas' => 'required|max:30',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;

        if($request->hasFile('icon')){
            if($request->icon && file_exists(storage_path('app/public/'.$request->icon))){
                Storage::delete('public/'.$request->icon);
            }
            $file = $request->file('icon')->store('icon','public');
            $fasilitas->icon = $file;
        } 
        $fasilitas->save();
        return redirect()->back()->with('status','Fasilitas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Fasilitas::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('status','Fasilitas Berhasil Dihapus');
    }

    public function ajaxSearch(Request $request)
    {
        $data = Fasilitas::where('nama_fasilitas', 'LIKE', '%'.request('q'). '%')->paginate(20);
        return response()->json($data);
    }
}
