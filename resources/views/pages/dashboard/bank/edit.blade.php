@extends('layouts.dashboard')

@section('title')
    Edit Bank
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">{{$bank->nama_bank}}</div>
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
                        <div class="card-title">Edit Bank - {{$bank->nama_bank}}</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bank.update',$bank->id)}}" method="post">
                            @csrf @method('put')
                        <div class="form-group">
                            <label for="nama_nasabah">Nama Pemilik</label>
                            <input type="text" class="form-control @error('nama_nasabah') is-invalid @enderror" id="nama_nasabah" name="nama_nasabah" value="{{old('nama_nasabah') ? od('nama_nasabah') : $bank->nama_nasabah}}">
                            @error('nama_nasabah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_bank">Nama Bank</label>
                            <input type="text" class="form-control @error('nama_bank') is-invalid @enderror" id="nama_bank" name="nama_bank" value="{{old('nama_bank') ? od('nama_bank') : $bank->nama_bank}}">
                            @error('nama_bank')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_rek">Nomor Rekening</label>
                            <input type="text" class="form-control @error('no_rek') is-invalid @enderror" id="no_rek" name="no_rek" value="{{old('no_rek') ? od('no_rek') : $bank->no_rek}}">
                            @error('no_rek')
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