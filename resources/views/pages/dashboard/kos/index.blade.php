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
              <a href="{{route('kos.create')}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah kos</a>
            </div>
                <!-- <div class="row">
                    @foreach($kosan as $kosan)
                    <div class="col-4">
                        <div class="card" style="width: 20rem;">
                        <div class="gallery-container">
                            <img class="card-img-top" src="{{Storage::url($car->gallery->first()->foto ?? '')}}" alt="Foto belum ada">
                            <a href="{{route('remove.car',$car->id)}}" class="delete-gallery" onclick="return confirm('Yakin ingin menghapus {{$car->nama_mobil}} ?')">
                                <img src="/backend/dist/img/icon-delete.svg">
                            </a>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between" style="font-weight: bold;">
                                <div class="text-success">
                                <h5>{{$car->nama_mobil}}</h5>
                            </div>
                            <div class="text-success">
                                Rp. {{number_format($car->harga_rental)}} / Bulan
                            </div>
                            </div>
                            <p class="card-text">
                                <li class="text-muted">Transmisi : {{$car->tranmisi_mobil}}</li>
                                <li class="text-muted">Color     : {{$car->warna_mobil}}</li>
                                <li class="text-muted">Type      : {{$car->kategori->kategori_mobil}}</li>
                                <li class="text-muted">Lepas kunci : {{$car->lepas_kunci == 1 ? 'ya' : 'tidak'}}</li>
                            </p>
                            <a href="{{route('car.edit',$car->id)}}" class="btn btn-sm btn-block btn-info btn-shadow">Detail / Edit</a>
                        </div>
                    </div>
                    @endforeach
                </div> -->
            </div>
          </div>
        </section>
@stop
