<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kamar;
use App\Models\Booking_detail;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class BookingController extends Controller
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
        // dd($request->all());
        $mulai = date_create($request->mulai_sewa);
        $akhir = date_create($request->habis_sewa);

        $hasil = $mulai->diff($akhir);

        $mulai_sewa = date('y-m-d',strtotime($request->mulai_sewa)); 
        $habis_sewa = date('y-m-d',strtotime($request->habis_sewa)); 
        

        $booking = Booking::create([
            'mulai_sewa' => $request->mulai_sewa,
            'habis_sewa' => $request->habis_sewa,
            'user_id' => \Auth::user()->id,
            'bank_id' => $request->bank_id,
            'status' => 'menunggu',
            'bukti_bayar' => $request->file('bukti_bayar')->store('bukti','public'),
        ]);
        // 'booking_id','kos_id','kamar_id','total_bayar','lama_sewa'
        Booking_detail::create([
            'booking_id' => $booking->id,
            'kos_id' => $request->kos_id,
            'kamar_id' => $request->kamar_id,
            'lama_sewa' => $hasil->m,
            'total_bayar' => $request->biaya * $hasil->m / 2,
        ]);

        return redirect()->route('success');
    }

    public function bookinganSaya()
    {
        $bookinganSaya = Booking_detail::with(['booking.user','kos.gallery','kamar'])->whereHas('booking', function($booking){
                $booking->where('user_id', \Auth::user()->id);
        })->get(); 
        return view('pages.dashboard.booking.penyewa.index', compact('bookinganSaya'));
    }

    public function bookinganKosMasuk()
    {
        $bookingMasuk = Booking_detail::with(['booking.user','kos.gallery'])->whereHas('kos', function($kos){
            $kos->where('user_id', \Auth::user()->id);
        })->get(); 
        return view('pages.dashboard.booking.pemilik.index', compact('bookingMasuk'));
    }

    public function terimaBooking(Request $request ,$idKamar, $idBooking, $idKos)
    {
        // dd($request->all()); die;
        $booking = Booking::findOrFail($idBooking);
        $booking->status = 'diterima';
        $booking->save();

        $kamar = Kamar::findOrFail($idKamar);
        $kamar->status = 'digunakan';
        $kamar->save();

        Testimonial::create([
            'kos_id' => $idKos,
            'user_id' => $request->user,
            'testimonial' => '',
        ]);


        return redirect()->back()->with('status','Booking Berhasil Diterima');

    }

    public function tolakBooking($idKamar, $idBooking)
    {
        $booking = Booking::findOrFail($idBooking);
        $booking->status = 'ditolak';
        $booking->save();

        $kamar = Kamar::findOrFail($idKamar);
        $kamar->status = 'tersedia';
        $kamar->save();

        return redirect()->back()->with('status','Booking Telah Ditolak');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
