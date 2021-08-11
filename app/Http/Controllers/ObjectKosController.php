<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Bank;

class ObjectKosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->keyword;
        if($filterKeyword){
            $kosan = Kos::with('kamar')->whereHas('kamar')->where('status','=','aktifkan')->where('alamat','LIKE',"%$filterKeyword%")->paginate(48);
        } else {
            $kosan = Kos::with('kamar')->whereHas('kamar')->where('status','=','aktifkan')->paginate(48);
        }

        return view('pages.semua-kos', compact('kosan'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show (Request $request, $id)
    {
        // return $request->all();
        $kos = Kos::with('kamar.galleryKamar','user.bank')->where('id', $id)->first(); 
        $banks = Bank::where('user_id', $kos->user_id)->get();
        return view('pages.detail', compact('kos','banks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
