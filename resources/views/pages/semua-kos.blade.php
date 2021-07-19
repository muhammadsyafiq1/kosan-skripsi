@extends('layouts.landingPage')

@section('title')
    Semua Kos
@stop

@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h4 class="title-single">Semua Kos-kosan Juragan Kos</h4>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('semua-kos-tersedia')}}">Semua Kos</a>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
<!--  -->
<section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            <form action="{{route('semua-kos-tersedia')}}">
              <input type="text" name="keyword" placeholder="Cari alamat kos..">
            </form>
          </div>
        </div>
        @foreach($kosan as $kos)
        <div class="col-md-4">
            <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{Storage::url($kos->gallery->first()->gambar ?? '')}}" style="height:400px;" class="w-100 img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h2 class="card-title-a">
                    <a href="property-single.html">{{$kos->nama_kos}} </a>
                      <br /> 
                      <span class="text-white" style="font-size:12px; ">Lokasi: {{$kos->alamat}}</span>
                  </h2>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <a class="price-a" href="{{route('kos.detail',$kos->slug)}}">
                      Detail
                    </a>
                  </div>
                </div>
                <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Kamar Kosong</h4>
                        @php $k = $kos->kamar->where('status','=','tersedia')->count(); @endphp
                        <span> {{$k}}</span>
                      </li>
                      @foreach($kos->fasilitas as $fasilitas)
                      <li>
                        <h4 class="card-info-title">{{$fasilitas->nama_fasilitas == 'penjaga' ? 'Penjaga' : ''}}</h4>
                        <span>{{$fasilitas->nama_fasilitas == 'penjaga' ? 'Tersedia' : ''}}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">{{$fasilitas->nama_fasilitas == 'garasi' ? 'garasi' : ''}}</h4>
                        <span>{{$fasilitas->nama_fasilitas == 'garasi' ? 'Tersedia' : ''}} </span>
                      </li>
                      @endforeach
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row mt-3">
        <div class="col-12 text-center">
          {{$kosan->links()}}
        </div>
      </div>
    </div>
  </section>
@stop