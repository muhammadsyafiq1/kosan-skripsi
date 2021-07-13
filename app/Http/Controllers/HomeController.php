<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kos = Kos::with('kamar')->orderBy('id','desc')
                ->where('status','=','aktifkan')
                ->first();

        $kosan = Kos::where('status','=','aktifkan')->get();

        return view('pages.home', compact('kosan','kos'));
    }

    public function detail ($slug)
    {
        $kos = Kos::where('slug', $slug)->first(); 
        return view('pages.detail', compact('kos'));
    }
}
