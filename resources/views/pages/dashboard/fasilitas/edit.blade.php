@extends('layouts.dashboard')

@section('title')
    Edit Fasilitas
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">{{$fasilitas->nama_fasilitas}}</div>
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
                        <div class="card-title">Edit fasilitas - {{$fasilitas->nama_fasilitas}}</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('fasilitas.update',$fasilitas->id)}}" method="post" enctype="multipart/form-data">
                            @csrf @method('put')
                        <div class="form-group">
                            <label for="nama_fasilitas">Nama Fasilitas</label>
                            <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas" value="{{old('nama_fasilitas') ? old('nama_fasilitas') : $fasilitas->nama_fasilitas}}">
                            @error('nama_fasilitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label> <br>
                            <img src="{{Storage::url($fasilitas->icon)}}" alt="fasilitas icon" style="width: 100px;">
                            <input type="file" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon">
                            <i>Kosongkan bila tidak ingin diubah</i>
                            @error('icon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{old('keterangan') ? old('keterangan') : $fasilitas->keterangan}}">
                            @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-block text-center btn-success" type="submit">Ubah</button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@stop