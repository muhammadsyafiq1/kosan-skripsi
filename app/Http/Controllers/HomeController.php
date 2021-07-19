<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kos;
use App\Models\Blog;
use App\Models\Bank;
use App\Models\Booking_detail;

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
        $kos = Kos::with('kamar','gallery')->whereHas('gallery')->orderBy('id','desc')
                ->where('status','=','aktifkan')
                ->first();

        $kosan = Kos::where('status','=','aktifkan')->take(6)->get();

        $blogs = Blog::all();        

        return view('pages.home', compact('kosan','kos','blogs'));
    }

    public function detail ($slug)
    {
        $kos = Kos::with('kamar.galleryKamar','user.bank')->where('slug', $slug)->first(); 
        $banks = Bank::where('user_id', $kos->user_id)->get();
        return view('pages.detail', compact('kos','banks'));
    }

    public function kosKosan(Request $request)
    {
        $filterKeyword = $request->keyword;
        if($filterKeyword){
            $kosan = Kos::with('kamar')->whereHas('kamar')->where('status','=','aktifkan')->where('alamat','LIKE',"%$filterKeyword%")->paginate(48);
        } else {
            $kosan = Kos::with('kamar')->whereHas('kamar')->where('status','=','aktifkan')->paginate(48);
        }

        return view('pages.semua-kos', compact('kosan'));
    }

    public function detailBlog ($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('pages.detail-blog', compact('blog'));
    }

    public function lihatSemuaBlog ()
    {
        $blogs = Blog::all();
        return view('pages.lihat-semua-blog', compact('blogs'));
    }

    public function getBooking($idKos, $idKamar)
    {
        return 'ok';
    }

    
}
