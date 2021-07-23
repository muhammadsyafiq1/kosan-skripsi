@extends('layouts.landingPage')

@section('title')
    Semua Blog
@endsection

@section('content')
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Semua Postingan Menarik</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{url('/')}}">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Semua Blog
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Grid Star /-->
  <section class="news-grid grid mb-5">
    <div class="container">
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-md-4">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img style="height: 360px;" src="{{Storage::url($blog->gambar)}}" alt="" class="img-b img-fluid">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="#" class="category-b">{{$blog->kategori}}</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="{{route('blog.detail',$blog->slug)}}">{{$blog->title}}</a>
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
  <!--/ News Grid End /-->
@endsection