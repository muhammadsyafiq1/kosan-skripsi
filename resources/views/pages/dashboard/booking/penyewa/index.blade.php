@extends('layouts.dashboard')

@section('title')
    Kos yang saya booking
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">Kos Yang Saya Booking</div>
            </div>
          </div>
          <div class="section-body">
            <div class="row ">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                      <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>Print</th>
                                <th>Nama Kos</th>
                                <th>ID Kamar</th>
                                <th>Periode Sewa</th>
                                <th>Lama Sewa</th>
                                <th>Status Penyewaan</th>
                                <th>Status Booking Saya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookinganSaya as $booking)
                                @php  $dateNow = date('m-d-Y') @endphp
                                @php  $deadline = date('m-d-Y',strtotime($booking->booking->habis_sewa)) @endphp
                            <tr>
                                <td>
                                  <a href="{{route('cetakPdf',$booking->id)}}" class="btn btn-sm btn-danger px-3" target="_blank">
                                    <i class="fa fa-print"></i>
                                  </a>
                                </td>
                                <td>{{$booking->kos->nama_kos ?? 'tidak tersedia'}}
                                    <div class="table-links">
                                    <div class="bullet"></div>
                                    <a href="{{route('kos.detail',$booking->kos->slug ?? '')}}" class="text-warning">Detail Kos</a>
                                    </div>                                
                                </td>
                                <td>
                                     <div class="badge badge-success">{{$booking->kamar->id ?? ''}}</div>
                                </td>
                                <td>
                                    {{date('d / M / Y',strtotime($booking->booking->mulai_sewa ?? ''))}} - <br>  {{date('d / M / Y',strtotime($booking->booking->habis_sewa ?? ''))}}  
                                </td>
                                <td>
                                    <span class="text-info">{{$booking->lama_sewa ?? ''}} Bulan</span> 
                                </td>
                                <td>
                
                                    @if($booking->booking->status == 'menunggu')
                                        <span>Menunggu Approve Pemilik Kos</span>
                                    @else
                                        @if($deadline > $dateNow)
                                            Masa Kos Anda Masih Berlanjut
                                        @else
                                            Masa Kos Anda Telah Habis
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @if($booking->booking->status == 'menunggu')
                                        <span class="text-warning"><i>Sedang Diproses</i></span>
                                    @else
                                        <span class="text-success"><i>Telah Diterima</i></span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@stop

@push('scripts')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endpush