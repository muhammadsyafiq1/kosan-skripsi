@extends('layouts.landingPage')

@section('title')
    Detail Kos {{$kos->slug}}
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
              <img src="{{Storage::url($kos->gallery->first()->gambar ?? '')}}" alt="" style="height: 500px;">
            </div>
            @foreach($kos->gallery as $gallery)
              <div class="carousel-item-b">
                <img src="{{Storage::url($gallery->gambar)}}" alt=""  style="height: 500px;">
              </div>
            @endforeach
          </div>
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price ">
                <a class="btn btn-block btn-sm btn-success mb-2 text-white"><i class="fa fa-phone"></i> Hubungi</a> 
                @auth
                  <form action="{{route('kos-tersimpan.store')}}" method="post">
                  @csrf
                    <input type="hidden" name="kos_id" value="{{$kos->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-block btn-sm btn-light"><i class="fa fa-heart"></i> Simpan</button>
                  </form>
                @else
                <a href="{{route('login')}}" onClick="return confirm('Silahkan Login Dulu')" type="submit" class="btn btn-block btn-sm btn-light"><i class="fa fa-heart"></i> Simpan</a>
                @endauth
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
                      <strong>Booking:</strong>
                      @if($kos->is_booking == 1 )
                      <span>Tersedia</span>
                      @else
                      <span>Tidak Tersedia</span>
                      @endif
                    </li>
                    @if($kos->biaya_booking)
                    <li class="d-flex justify-content-between">
                      <strong>Biaya Boking:</strong>
                      <span>{{$kos->biaya_booking}}</span>
                    </li>
                    @endif
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
          @forelse($kos->kamar as $kamar)
            <div class="card shadow mb-5">
              <div class="card-body">
                <div class="row mb-5">
                  <div class="col-md-6 col-lg-5">
                    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="{{ Storage::url($kamar->galleryKamar->first()->gambar ?? '') }}" alt="First slide">
                        </div>
                        @foreach ($kamar->galleryKamar as $galleryKamar)
                        <div class="carousel-item">
                          <img class="d-block w-100" src="{{ Storage::url($galleryKamar->gambar?? '') }}" alt="">
                        </div>
                        @endforeach
                      </div>
<!--  -->
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
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
                        </div></div>
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
                        <ul>
                          @foreach($kamar->fasilitas as $fasilitas)
                            <li>{{$fasilitas->nama_fasilitas}} </li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div> 
                </div>
                <div class=" btn-block btn-sm btn-warning text-center text-white">
                  Rp. {{number_format($kamar->biaya_perbulan)}} / <span class="text-white b;l t6yukaq ">Bulan</span>
                </div>
                @auth
                  @if($kos->is_booking == 1)
                  <a href="{{url('booking/' . $kos->id . '/' . $kamar->id . '/')}}" class=" btn-block btn-sm btn-primary text-center">
                    <span class="text-white">Booking</span>
                  </a>
                  @endif
                @else
                 
                  <a class=" btn-block btn-sm btn-primary text-center" href="{{route('login')}}"onClick="return confirm('Anda Harus Login Dulu.')">
                    <span class="text-white">Booking</span>
                  </a>
                  
                @endauth
              </div>
            </div>
          @empty
          <div class="row">
            <div class=" col-12 alert alert-warning text-center"> Kamar Tidak Tersedia</div>
          </div>
          @endforelse
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
        <h5 style="font-style:italic;" class="mb-4">Apa Yang Mereka Katakan ?</h5>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          @forelse($kos->testimonial as $testimonial)
          <div class="row">
            <div class="col-1">
            @if ($testimonial->user->avatar)
                <img src="{{ Storage::url($testimonial->user->avatar) }}" class="rounded-circle mr-1" height="60">
            @else
                <img src="https://ui-avatars.com/api/?name={{ $testimonial->user->name }}" height="60" class="rounded-circle mr-1" />
            @endif
            </div>
            <div class="col">
            <p>"{{$testimonial->testimonial}}"<br><span style="font-style:normal;">- {{$testimonial->user->name}}</span></p>
            </div>
          </div>
          @empty
          <div class="row">
              <div class=" col-12 alert alert-warning text-center">
                    Belum Ada Testimonial
              </div>
          </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
  <!-- end testimonial -->


@endsection