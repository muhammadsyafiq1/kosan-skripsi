@extends('layouts.landingPage')

@section('title')
    Booking
@stop

@section('content')
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h5 class="title-single">Booking kos - {{$kamar->kos->nama_kos}}</h5> <br>
            <span class="badge badge-sm badge-success">{{number_format($kamar->biaya_perbulan)}}  /  Bulan</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{url('/')}}">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{$kamar->kos->nama_kos}}
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                ID Kamar - {{$kamar->id}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="contact">
    <div class="container">
      <div class="row" style="margin-top : -100px;">
        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12 section-md-t3">
                <img src="{{Storage::url($kamar->galleryKamar->first()->gambar)}}" width="500px">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
                <form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data">
                    <input name="kos_id" value="{{$kamar->kos->id}}" type="hidden">
                    <input name="kamar_id" value="{{$kamar->id}}" type="hidden">
                    <input type="hidden" value="{{$kamar->biaya_perbulan}}" name="biaya">
                            @csrf
                        <div class="form-group">
                            <label for="mulai_sewa">Mulai Sewa</label>
                            <input required type="date" class="form-control" id="mulai_sewa" name="mulai_sewa">
                        </div>
                        <div class="form-group">
                            <label for="habis_sewa">Hingga</label>
                            <input required type="date" class="form-control" id="habis_sewa" name="habis_sewa">
                        </div>
                        <div class="form-group">
                            <label for="bukti_bayar">Bukti Pembayaran DP</label>
                            <input required type="file" class="form-control" id="bukti_bayar" name="bukti_bayar">
                        </div>
                        <div class="form-group">
                            <label for="bank_id">Kirim Ke Rekening</label>
                            <select required name="bank_id" id="bank_id" class="form-control">
                                <option value="0" disabled selected>Pilih Rekening</option>
                                @foreach($banks  as $bank)
                                <option value="{{$bank->id}}">{{$bank->nama_bank}} - {{$bank->no_rek}} an {{$bank->nama_nasabah}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input required type="checkbox" name="agree" class="custom-control-input" id="agree">
                                <label class="custom-control-label text-muted" for="agree" style="font-size: 12px;">
                                    Ketentuan Untuk Booking Pada Kos {{$kamar->kos->nama_kos}} adalah {{$kamar->biaya_perbulan}} <br>
                                    Saya Mengerti Dan Saya Setuju Dengan Aturan Booking Kos {{$kamar->kos->nama_kos}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btns-m btn-block btn-sm btn-warning text-white mt-3 shadow" style="margin-bottom: 120px;">
                        Booking
                    </button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->
@stop