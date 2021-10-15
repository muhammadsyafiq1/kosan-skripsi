@extends('layouts.landingPage')

@section('title')
    Home
@endsection

@section('content')
    <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="height:650px; background-image: url('/frontend/img/slide-1.jpg')">
        
      </div>
    </div>
  </div>
  <!--/ Carousel end /-->

  <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h4>Kenapa memilih kami ?</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-check text-success"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h4>Kos terjamin</h4>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Kos-kosan yang terdaftar pada website. sebelumnya sudah terverifikasi oleh kami. dan keaslian kos terjamin
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-users text-success"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h4>Berbagai type kos</h4>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Terdapat banyak type kos-kosan ada khusus pria, wanita dan bahkan untuk yang sudah berkeluarga.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-building-o text-success"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h4>Fasilitas</h4>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Tersedia fasilitas-fasilitas baik pada kos-kosan yang terdaftar pada website juragan kos.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Services End /-->

  <!--/ kosan terbaru /-->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h4>Kos-kosan Terbaru</h4>
            </div>
            <div class="title-link">
              <a href="{{route('object-kos.index')}}">Lihat semua Kosan
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="property-carousel" class="owl-carousel owl-theme">
        @foreach($kosan as $kos)
        @php  $jmlKamar = $kos->kamar->where('status','tersedia')->count();  @endphp
        @if($jmlKamar > 0)
        <div class="carousel-item-b">
          <div class="card-box-a card-shadow">
            <div class="img-box-a">
              <img src="{{Storage::url($kos->gallery->first()->gambar ?? '')}}" style="height:400px;" class="w-100 img-a img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-overlay-a-content">
                <div class="card-header-a">
                  <h4 class="card-title-a">
                    <a href="property-single.html">{{$kos->nama_kos}} </a>
                      <br /> 
                      <span class="text-white" style="font-size:12px; ">Lokasi: {{$kos->alamat}}</span>
                  </h4>
                </div>
                <div class="card-body-a">
                  <div class="price-box d-flex">
                    <!-- <a class="price-a" href="{{route('kos.detail',$kos->slug)}}">
                      Detail
                    </a> -->
                    <a href="#" onclick="openDirection({{ $kos->latitude }}, {{ $kos->longitude }}, {{ $kos->id }})" class="price-a">Detail</a>
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
        @endif
        @endforeach
      </div>
    </div>
  </section>
  <!--/ ksoan terbaru /-->

  <!--/ News Star /-->
  <section class="section-news section-t8 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h4>Latest News</h4>
            </div>
            <div class="title-link">
              <a href="blog-grid.html">All News
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="new-carousel" class="owl-carousel owl-theme">
      @foreach($blogs as $blog)
        <div class="carousel-item-c">
        
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{Storage::url($blog->gambar)}}" style="height:380px;" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">{{$blog->kategori}}</a>
                </div>
                <div class="card-title-b">
                  <h4 class="title-2">
                    <a  href="{{route('blog.detail',$blog->slug)}}">{{$blog->title}}</a>
                  </h4>
                </div>
                <div class="card-date">
                  <span class="date-b">{{date('d M. Y',strtotime($blog->created_at))}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--/ News End /-->
@endsection