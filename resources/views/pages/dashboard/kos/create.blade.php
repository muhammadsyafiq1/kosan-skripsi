@extends('layouts.dashboard')

@section('title')
    Tambah Kos
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb"> <a href="{{route('kos.index')}}">Kembali</a> </div>
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
                        <div class="card-title">Form Tambah Kos</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('kos.store')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_kos">Nama Kos</label>
                                    <input type="text" class="form-control @error('nama_kos') is-invalid @enderror" id="nama_kos" name="nama_kos" value="{{old('nama_kos')}}">
                                    @error('nama_kos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                    <label for="alamat">Alamat Kos</label>
                                    <textarea class="form-control @error('alamat_kos') is-invalid @enderror" name="alamat" id="alamat"></textarea>
                                    @error('alamat_kos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <div class="row">
                          <div class="form-group col-12">
                              <span>Apakah anda ingin menggunakan fitur boking ?</span> <br>
                                <div class="form-check">
                              <input class="form-check-input" type="radio" name="is_booking" id="tombol_show" value="1">
                              <label class="form-check-label" for="tombol_show">
                                Iya
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="is_booking" id="tombol_hide" value="0">
                              <label class="form-check-label" for="tombol_hide">
                                Tidak
                              </label>
                            </div>
                          </div>
                        </div>
                        <!--  -->
                        <div class="row">
                          <div class="col-12" id="box">
                            <label for="biaya_booking">Ketentuan Booking</label>
                            <input type="text" name="biaya_booking" class="form-control @error('biaya_booking') is-invalid @enderror" placeholder="ex: Biaya booking 100000 / 50% harga kamar">
                            @error('biaya_booking')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <!--  -->
                        <div class="form-group">
                            <label for="type_kos">Penghuni Kos</label>
                            <select class="form-control @error('type_kos') is-invalid @enderror" name="type_kos" id="type_kos">
                                <option value="0" selected disabled>--Penghuni--</option>
                                <option value="pria">--Laki-laki--</option>
                                <option value="wanita">--Wanita--</option>
                                <option value="priadanwanita">--Laki-laki dan Wanita--</option>
                            </select>
                            @error('type_kos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fasilitas">Fasilitas Kos</label>
                            <select style="width: 500px;" name="fasilitas[]" class="form-control @error('fasilitas') is-invalid @enderror fasilitas" multiple></select>
                            @error('fasilitas')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="luas_kos">Luas Kos</label>
                                    <input type="text" class="form-control @error('luas_kos') is-invalid @enderror" id="luas_kos" name="luas_kos" value="{{old('luas_kos')}}">
                                    @error('luas_kos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                    <label for="aturan_kos">Aturan Kos</label>
                                    <textarea class="form-control @error('aturan_kos') is-invalid @enderror" name="aturan_kos" id="aturan_kos"></textarea>
                                    @error('aturan_kos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="deskripsi_kos">Tentang Kos</label>
                                <textarea class="form-control @error('deskripsi_kos') is-invalid @enderror" name="deskripsi_kos" id="deskripsi_kos"></textarea>
                                @error('deskripsi_kos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                <!--  -->
                            <div id="here-maps" class="form-group">
                                <label for="">Pin Location</label>
                                <div style="height: 300px" id="mapContainer"></div>
                            </div>
                            <div class="form-group">
                                <label for="lat">Latitude</label>
                                <input type="text" id="lat" class="form-control @error('latitude') is-invalid @enderror" name="latitude">
                                @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lng">Longitude</label>
                                <input type="text" id="lng" name="longitude" class="form-control @error('longitude') is-invalid @enderror">
                                @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <!--  -->
                            </div>
                            <button class="btn btn-sm btn-block text-center btn-success" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@stop

@push('scripts')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script>
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
  </script>

  <script>
    $(document).ready(function() {
    
      $("#tombol_hide").click(function() {
        $("#box").hide();
      })
    
      $("#tombol_show").click(function() {
        $("#box").show();
      })
    
    });
  </script>

<script>
        window.action = "submit"
        // jQuery(document).ready(function () {
        //     jQuery(".btn-add").click(function () {
        //         let markup = jQuery(".invisible").html();
        //         jQuery(".increment").append(markup);
        //     });
        //     jQuery("body").on("click", ".btn-remove", function () {
        //         jQuery(this).parents(".input-group").remove();
        //     })
        // })
    </script>
@endpush

