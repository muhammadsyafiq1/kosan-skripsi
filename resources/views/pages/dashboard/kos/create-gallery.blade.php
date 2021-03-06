@extends('layouts.dashboard')

@section('title')
    Gallery Kos
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">Gambar Kos - {{$kos->nama_kos}}</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row ">
            
            @if(session('status'))
                <div class="alert alert-warning col-10" role="alert">
                    {{session('status')}}
                </div>
            @endif
              <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambahkan Gambar Untuk Kos - {{$kos->nama_kos}}</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($kos->gallery as $gallery)
                            <div class="col-md-4">
                                <div class="gallery-container">
                                    <img src="{{ Storage::url($gallery->gambar) }}" class="w-100">
                                    <a href="{{ route('delete-gallery',$gallery->id) }}" class="delete-gallery">
                                        <img src="/backend/assets/img/icon-delete.svg">
                                    </a>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12">
                                <form action="{{route('gallery.store')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @error('gambar')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                    @enderror
                                    <input type="hidden" name="kos_id" value="{{ $kos->id }}">
                                    <input name="gambar" type="file" id="file" style="display: none;" onchange="form.submit()">
                                    <button class="btn btn-secondary btn-block mt-3" onclick="thisFileUpload()" type="button">
                                        Tambahkan Gambar
                                    </button>
                                    @if($kos->gallery->count() > 0)
                                    <a class="btn btn-success btn-block mt-3" href="{{route('kos.index')}}">
                                        Selesai 
                                    </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                        </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <style>
  .gallery-container .delete-gallery{
     display: block;
  position: absolute;
  top: -10px;
  right: 0;
  }
</style>
@stop


@push('scripts')
<script>
    function thisFileUpload() {
            document.getElementById("file").click();
        }
    </script>
@endpush