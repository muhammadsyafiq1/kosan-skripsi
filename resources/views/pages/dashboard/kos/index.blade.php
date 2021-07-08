@extends('layouts.dashboard')

@section('title')
    Kelola Bank
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-bank active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb-bank">Semua Bank</div>
            </div>
          </div>
          <div class="section-body">
            <div class="section-header-button mb-3">
              <a href="{{route('kos.create')}}" class="btn btn-primary">Tambah kos</a>
            </div>
            <div class="row">
              <div class="col-12">
              @if(session('status'))
                <div class="alert alert-warning col-12" role="alert">
                    {{session('status')}}
                </div>
              @endif
              </div>
            </div>
            <!--  -->
                <div class="row">
                    @foreach($kosan as $kos)
                        <div class="col-4">
                        <div class="card" style="width: 20rem;">
                        <div class="gallery-container">
                            <!-- <img class="card-img-top" src="{{Storage::url($kos->gallery->first()->foto ?? '')}}" alt="Foto belum ada"> -->
                            <img class="card-img-top" src="{{Storage::url($kos->gallery->first()->gambar ?? '')}}" alt="Foto belum ada">
                            <a href="{{route('delete-kos',$kos->id)}}" class="delete-gallery" onclick="return confirm('Yakin ingin menghapus {{$kos->nama_kos}} ?')">
                                <img src="/backend/assets/img/icon-delete.svg">
                            </a>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between" style="font-weight: bold;">
                                <div class="text-success">
                                <h5>{{$kos->nama_kos}}</h5>
                            </div>
                            <div class="text-warning">
                                 5 / Kamar
                            </div>
                            </div>
                            <p class="card-text">
                              <ul class="list-group">
                                <li class="text-muted"><span class="float-right">Penghuni</span> : <span class="float-left">{{$kos->type_kos}}</span></li>
                                <li class="text-muted">Total Kamar : {{$kos->kamar->count()}}</li>
                                @foreach($kos->kamar as $k)
                                   @php
                                    $tersedia = $k->where('status','=','tersedia')->count();
                                   @endphp
                                @endforeach
                                   <li class="text-muted">Kamar Kosong : {{$tersedia}}</li>
                              </ul>
                            </p>
                            @if($kos->status == 'nonaktif' )
                            <div class="text-muted mb-3"><i class="text-danger">Menuggu Approve Admin</i></div>
                            @endif
                            <a href="#" class="btn btn-sm btn-block btn-info btn-shadow">Detail / Edit</a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <div class="row">
                      <div class="col-12 text-center mt-4">
                      {{$kosan->links()}}
                      </div>
                    </div>
                </div>
            <!--  -->
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
