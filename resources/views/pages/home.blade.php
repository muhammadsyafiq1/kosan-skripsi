@extends('layouts.landingPage')

@section('title')
    Home
@endsection

@section('content')
    <!--/ Carousel Star /-->
  <div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
      <div class="carousel-item-a intro-item bg-image" style="height:650px; background-image: url('{{Storage::url($kos->gallery->first()->gambar ?? '')}}')">
        <div class="overlay overlay-a"></div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top">{{$kos->alamat}}
                      <br> Terakhir Update :  {{date('D-m-Y',strtotime($kos->created_at))}}</p>
                    <h1 class="intro-title mb-4">
                    <span class="">{{$kos->nama_kos}} </span> 
                    <p class="intro-subtitle intro-price">
                      <a href="{{route('kos.detail',$kos->slug)}}"><span class="price-a">Detail</span></a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
              <h2 class="title-a">Kenapa memilih kami ?</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="fa fa-check"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Kos terjamin</h2>
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
                <span class="fa fa-users"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Berbagai type kos</h2>
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
                <span class="fa fa-building-o"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Fasilitas</h2>
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
              <h2 class="title-a">Kos-kosan Terbaru</h2>
            </div>
            <div class="title-link">
              <a href="{{route('semua-kos-tersedia')}}">Lihat semua Kosan
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="property-carousel" class="owl-carousel owl-theme">
        @foreach($kosan as $kos)
        <div class="carousel-item-b">
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
              <h2 class="title-a">Latest News</h2>
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
                  <h2 class="title-2">
                    <a  href="{{route('blog.detail',$blog->slug)}}">{{$blog->title}}</a>
                  </h2>
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