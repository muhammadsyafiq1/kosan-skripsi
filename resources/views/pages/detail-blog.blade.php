@extends('layouts.landingPage')

@section('title')
    Detail {{$blog->slug}}
@stop

@section('content')
  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h4 class="title-single">{{$blog->title}}</h4>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{url('/')}}">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                {{$blog->title}}
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ News Single Star /-->
  <section class="news-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="news-img-box text-center">
            <img src="{{Storage::url($blog->gambar)}}" style="width: 500px;" alt="" class="img-fluid ">
          </div>
        </div>
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
          <div class="post-information">
            <ul class="list-inline text-center color-a">
              <li class="list-inline-item mr-2">
                <strong>Penulis: </strong>
                <span class="color-text-a">{{$blog->author}}</span>
              </li>
              <li class="list-inline-item mr-2">
                <strong>Kategori: </strong>
                <span class="color-text-a">{{$blog->kategori}}</span>
              </li>
              <li class="list-inline-item">
                <strong>Tanggal: </strong>
                <span class="color-text-a">{{date('d M. Y',strtotime($blog->created_at))}}</span>
              </li>
            </ul>
          </div>
          <div class="post-content color-text-a">
            <p class="post-intro">
            <p>
              {!!$blog->isi!!}
            </p>
            @if($blog->quote)
            <blockquote class="blockquote">
              <p class="mb-4">{{$blog->quote}}.</p>
              <footer class="blockquote-footer">
                <strong>{{$blog->quote_author}}</strong>
                <cite title="Source Title"></cite>
              </footer>
            </blockquote>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ News Single End /-->
@endsection