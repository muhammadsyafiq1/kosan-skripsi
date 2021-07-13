@extends('layouts.landingPage')

@section('title')
    Home
@endsection

@section('content')
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">{{$kos->nama_kos}}</h1>
            <span class="color-text-a">{{$kos->alamat}}</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{$kos->nama_kos}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 mb-4">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <img src="{{Storage::url($kos->gallery->first()->gambar ?? '')}}" alt="">
            </div>
            @foreach($kos->gallery as $gallery)
              <div class="carousel-item-b">
                <img src="{{Storage::url($gallery->gambar)}}" alt="">
              </div>
            @endforeach
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money">$</span>
                  </div>
                  <div class="card-title-c align-self-center">
                    <h5 class="title-c">15000</h5>
                  </div>
                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Informasi Kos</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>Kos ID:</strong>
                      <span>{{$kos->id}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Alamat:</strong>
                      <span>{{$kos->alamat}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Jenis Kos:</strong>
                      <span>{{$kos->type_kos}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Aturan Kos:</strong>
                      <span>{{$kos->aturan_kos}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Area:</strong>
                      <span>{{$kos->luas_kos}}
                      </span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Kamar:</strong>
                      <span>{{$kos->kamar->count()}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Pemilik Kos:</strong>
                      <span>{{$kos->user->name}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Kontak Pemilik:</strong>
                      <span>{{$kos->user->no_hp}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Tentang Kos</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                <p class="description color-text-a">
                  {{$kos->deskripsi_kos}}
                </p>
              </div>
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Fasilitas Kos</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ol class="list-a no-margin">
                  @foreach($kos->fasilitas as $fasilitas)
                    <li>{{$fasilitas->nama_fasilitas}}</li> &middot; 
                  @endforeach
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- pilihan kamar -->
        <div class="col-md-12 container">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Pilihan Kamar</h3>
              </div>
            </div>
          </div>
          @foreach($kos->kamar as $kamar)
            <div class="card shadow mb-5">
              <div class="card-body">
                <div class="row mb-5">
                  <div class="col-md-6 col-lg-5">
                    <img src="/frontend/img/slide-2.jpg" alt="" class="w-100 rounded">
                  </div>
                  <div class="col-md-6 col-lg-5">
                    <div class="mb-4">
                      <h3>Kamar ID : {{$kamar->id}}</h3>
                      <div class="btn btn-success btn-sm px-4">
                        Kosong
                      </div>
                    </div>
                    <hr>
                    <div class="text-muted">
                      <div class="row">
                        <div class="col-5">
                          Jumlah Kasur
                        </div>
                        <div class="col-2">
                          :
                        </div>
                        <div class="col-2">
                          {{$kamar->jumlah_kasur}}
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-5">
                          Luas Kamar
                        </div>
                        <div class="col-2">
                          :
                        </div>
                        <div class="col-4">
                          {{$kamar->luas_kamar}}
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-5">
                          Ukuran kamar
                        </div>
                        <div class="col-2">
                          :
                        </div>
                        <div class="col-2">
                          {{$kamar->ukuran_kamar}}
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5 container">
                      <p class="text-muted" style="font-weight: bold;">Fasilitas kamar &nbsp; : &nbsp;</p>
                      <div class="col-12 amenities-list color-text-a">
                        <ul class="list-a no-margin">
                          <li>Pria & Wanita</li>
                          <li>Tersedia Dapur</li>
                          <li>Kolam renang</li>
                          <li>Jam bertamu bebas</li>
                          <li>Internet</li>
                          <li>Parking</li>
                          <li>Sun Room</li>
                          <li>Boleh bawa peliharaan</li>
                        </ul>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class=" btn-block btn-sm btn-warning text-center ">
                  Rp. {{number_format($kamar->biaya_perbulan)}} / <span class="text-muted">Bulan</span>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!-- end pilihan kamar -->
      </div>
      <!-- maps -->
      <!-- <section class="contact mb-4">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="contact-map box">
                <div id="map" class="contact-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> -->
      <!-- end masp -->
    </div>
  </section>
  <!--/ Property Single End /-->

  <!-- testimonial -->
  <div class="row" style="margin-bottom:50px;">
    <div class="container">
        <hr>
        <h5 style="font-style:italic;">Apa Yang Mereka Katakan ?</h5>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <p>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">- Larry Poge</span></p>
        </div>
      </div>
    </div>
  </div>
  <!-- end testimonial -->
@endsection