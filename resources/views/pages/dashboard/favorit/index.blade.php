@extends('layouts.dashboard')

@section('title')
    Kos Favorit
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">Kos Favorit</div>
            </div>
          </div>
          <div class="section-body">
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
                    @forelse($kos as $kos)
                        <div class="col-4">
                        <div class="card" style="width: 20rem;">
                        <div class="gallery-container">
                            <img class="card-img-top" src="{{Storage::url($kos->kos->gallery->first()->gambar ?? '')}}" alt="Foto belum ada">
                            <a href="{{route('delete.kos-tersimpan',$kos->id)}}" class="delete-gallery" onclick="return confirm('Yakin ingin menghapus {{$kos->nama_kos}} ?')">
                                <img src="/backend/assets/img/icon-delete.svg">
                            </a>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between" style="font-weight: bold;">
                                <div class="text-success">
                                <h6>{{$kos->kos->nama_kos}}</h6>
                                <div class="text-muted mb-3">
                                    Disimpan pada : {{date('D-M-Y'.strtotime($kos->created_at))}}
                                </div>
                            </div>
                            </div>
                            <a href="{{route('kos.edit',$kos->id)}}" class="btn btn-sm btn-block btn-info btn-shadow">DETAIL KOS</a>
                        </div>
                      </div>
                    </div>
                    @empty
                    <div class="row  col-12">
                      <div class="alert alert-warning text-center">
                        Kos Favorit Belum Ada
                      </div>
                    </div>
                    @endforelse
                    <div class="row">
                      <div class="col-12 text-center mt-4">
                      {{$kos->links()}}
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
