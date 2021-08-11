@extends('layouts.dashboard')

@section('title')
    Edit Kos
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">{{$kos->nama_kos}}</div>
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
                        <div class="card-title">Anda Dapat Melakukan update Kos dan Kamar.</div>
                    </div>
                    <div class="card-body">
                        {!! Form::model($kos, ['route' => ['kos.update', $kos->id], 'method' => 'put', 'files' => true]) !!}
                            @csrf @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-5">
                                        <img src="{{Storage::url($kos->gallery->first()->gambar ?? '')}}" class="w-100 img-rounded" alt="belum ada gambar"> 
                                    </div>
                                    <div class="col-12 col-lg-7">
                                    <div class="row">
                                            <!-- <div class="mb-2"> -->
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="nama_kos">Nama Kos</label>
                                                <input value="{{old('nama_kos') ? old('nama_kos') : $kos->nama_kos}}" type="text" name="nama_kos" class="form-control @error('nama_kos') is-invalid @enderror" id="nama_kos">
                                                @error('nama_kos')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="type_kos">Nama Kos</label>
                                                    <select class="form-control @error('type_kos') is-invalid @enderror" name="type_kos" id="type_kos">
                                                        <option value="wanita" {{$kos->type_kos == 'wanita' ? 'selected' : ''}}>--Wanita--</option>
                                                        <option value="pria" {{$kos->type_kos == 'pria' ? 'selected' : ''}}>--Laki-laki--</option>
                                                        <option value="priadanwanita" {{$kos->type_kos == 'priadanwanita' ? 'selected' : ''}}>--Laki-laki dan Wanita--</option>
                                                    </select>
                                                @error('type_kos')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- </div> -->
                                            <div class="col-lg-12 mb-3">
                                                <label for="alamat">Alamat Kos</label>
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" cols="30" rows="10">{{old('kos') ? old('kos') : $kos->alamat}}</textarea>
                                                @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="aturan_kos">Aturan Kos</label>
                                                <input value="{{old('aturan_kos') ? old('aturan_kos') : $kos->aturan_kos}}" type="text" name="aturan_kos" class="form-control @error('aturan_kos') is-invalid @enderror" id="aturan_kos">
                                                @error('aturan_kos')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-lg-6 mb-3">
                                                <label for="luas_kos">Luas Kos</label>
                                                <input value="{{old('luas_kos') ? old('luas_kos') : $kos->luas_kos}}" type="text" name="luas_kos" class="form-control @error('luas_kos') is-invalid @enderror" id="luas_kos">
                                                @error('luas_kos')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label for="deskripsi_kos">Deskripsi Kos Kos</label>
                                                <textarea class="form-control @error('deskripsi_kos') is-invalid @enderror" name="deskripsi_kos" id="deskripsi_kos" cols="30" rows="10">{{old('kos') ? old('kos') : $kos->deskripsi_kos}}</textarea>
                                                @error('deskripsi_kos')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                            <div class="form-group col-12 col-lg-12">
                                                <label for="fasilitas">Fasilitas Kos</label>
                                                <select required name="fasilitas[]" class="form-control @error('fasilitas') is-invalid @enderror fasilitas" multiple></select>
                                                @error('fasilitas')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-12">
                                        <div id="here-maps">
                                                <label for="">Pin Location</label>
                                                <div style="height: 500px" id="mapContainer"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Latitude</label>
                                                {!! Form::text('latitude', null, ['class' => $errors->has('latitude') ? 'form-control is-invalid' : 'form-control', 'id' => 'lat']) !!}
                                                @error('latitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="">Longitude</label>
                                                {!! Form::text('longitude', null, ['class' => $errors->has('longitude') ? 'form-control is-invalid' : 'form-control', 'id' => 'lng']) !!}
                                                @error('longitude')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-sm btn-success text-center btn-block" type="submit">
                                        Simpan
                                    </button>
                                    <a href="{{route('kos.index')}}" class="mt-2 btn btn-sm btn-block text-center btn-secondary" type="submit">Kembali</a>
                                </div>
                                <!--  -->
                                <!--  -->
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- gambar kos -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Kelola Gambar Kos
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($kos->gallery as $gallery)
                        <div class="col-lg-4 col-12">
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
                            @if($kos->gallery->count() == 0)
                            <div class="alert alert-danger text-center alert-sm mt-3">
                                Harap Berikan Gambar Kos
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- kelola kamar -->
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <button class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#exampleModal">Tambah Kamar</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped" id="table_id">
                    <thead>
                        <tr>
                            <th>ID kamar</th>
                            <th>Luas Kamar</th>
                            <th>Ukuran Kamar</th>
                            <th>Jml Kasur</th>
                            <th>Biaya</th>
                            <th>Fasilitas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kos->kamar as $kamar)
                        <tr>
                            <td>{{$kamar->id}}
                                <form action="{{route('kamar.destroy',$kamar->id)}}" method="post">
                                    @csrf @method('delete')
                                    <div class="table-links">
                                    <div class="bullet"></div>
                                    <a href="#">Edit</a>
                                    <div class="bullet"></div>
                                    <button onClick="return confirm('Yakin Ingin Menhgapus kamar ID {{$kamar->id}} ?')" type="submit" class="text-danger btn btn-sm">Trash</button>
                                    </div>
                                </form>                                   
                            </td>
                            <td>{{$kamar->luas_kamar}} meter</td>
                            <td>{{$kamar->ukuran_kamar}} meter</td>
                            <td>{{$kamar->jumlah_kasur}}</td>
                            <td>Rp. {{number_format($kamar->biaya_perbulan)}} / Bulan</td>
                            <td>
                                @if($kamar->status == 'tersedia')
                                    <span class="text-success">Tersedia</span>
                                @else
                                    <span class="text-danger">Digunakan</span>
                                @endif
                            </td>
                            <td>
                                <ul>
                                    @foreach($kamar->fasilitas as $fasilitas)
                                    <li>
                                        {{$fasilitas->nama_fasilitas}} &middot;
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{route('gallery.kamar',$kamar->id)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-image"></i>
                                    Foto
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('kamar.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="kos_id" value="{{$kos->id}}">
                    <div class="form-group">
                        <label for="luas_kamar">Luas Kamar</label>
                        <input type="text" class="form-control @error('luas_kamar') is-invalid @enderror" id="luas_kamar" name="luas_kamar">
                    </div>
                    <div class="form-group">
                        <label for="ukuran_kamar">Ukuran Kamar</label>
                        <input type="text" class="form-control @error('ukuran_kamar') is-invalid @enderror" id="ukuran_kamar" name="ukuran_kamar">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_kasur">Jumlah Kasur</label>
                        <input type="number" class="form-control @error('jumlah_kasur') is-invalid @enderror" id="jumlah_kasur" name="jumlah_kasur">
                    </div>
                    <div class="form-group">
                        <label for="biaya_perbulan">Biaya / Bulan</label>
                        <input type="text" class="form-control @error('biaya_perbulan') is-invalid @enderror" id="biaya_perbulan" name="biaya_perbulan">
                    </div>
                    <div class="form-group">
                            <label for="fasilitas">Fasilitas Kos</label>
                            <select style="width: 500px;" name="fasilitas[]" class="form-control @error('fasilitas') is-invalid @enderror fasilitas-kamar" multiple></select>
                            @error('fasilitas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
    .gallery-container .delete-gallery{
        display: block;
        position: absolute;
        top: -10px;
        right: 0;
    }
    </style>

@endsection



<!-- @push('scripts')
  

 

  
@endpush

  

  @push('scripts')
    <script>
     $(document).ready( function () {
        $('#table_id').DataTable();

    });
    function thisFileUpload() {
        document.getElementById("file").click();
    } ; 
    </script>
@endpush -->
@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
        $('.fasilitas-kamar').select2({
            placeholder: 'Loading ...',
            ajax: {
            url: "http://127.0.0.1:8000/ajax/fasilitas-kos/search",
            delay: 450,
            processResults: function({data}) {
                return {
                results: $.map(data, function (item) {
                    return {
                    text: `${item.nama_fasilitas}`,
                    id: item.id,
                    }
                })
                };
            },
            cache: true
            }
        });
        });
    </script>

<script>
    // edit kos
    $(document).ready(function () {
      $('.fasilitas').select2({
        placeholder: 'Loading ...',
        ajax: {
          url: "http://127.0.0.1:8000/ajax/fasilitas-kos/search",
          delay: 450,
          processResults: function({data}) {
            return {
              results: $.map(data, function (item) {
                return {
                  text: `${item.nama_fasilitas}`,
                  id: item.id,
                }
              })
            };
          },
          cache: true
        }
      });
    });

    var fasilitas = {!! $kos->fasilitas !!}
    fasilitas.forEach(function(fasilitas){
        var option = new Option(fasilitas.nama_fasilitas, fasilitas.id, true, true);
        $('.fasilitas').append(option).trigger('change');
    });

  </script>

    <script>
        window.action = "submit"
    </script>
@endpush

