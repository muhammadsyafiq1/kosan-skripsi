<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Bank;
use App\Models\Testimonial;

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
        $ratings = Testimonial::where('kos_id', $kos->id)->get(); 
        $rating_sum = Testimonial::where('kos_id', $kos->id)->sum('stars_rated'); 
        if($ratings->count() > 0){
            $rating_value = $rating_sum / $ratings->count();
        }else{
            $rating_value = 0;
        }
        return view('pages.detail', compact('kos','banks','rating_value','ratings'));
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
