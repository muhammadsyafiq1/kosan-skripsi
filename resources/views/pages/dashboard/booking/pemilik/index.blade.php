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
            @if(session('status'))
                <div class="alert alert-warning col-12" role="alert">
                    {{session('status')}}
                </div>
            @endif
              <div class="col-12">
                <div class="card">
                  <div class="card-body">

                    <div class="clearfix mb-3"></div>

                    <div class="table-responsive">
                      <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>ID Booking</th>
                                <th>Nama Penyewa</th>
                                <th>Nama Kos</th>
                                <th>ID Kamar</th>
                                <th>Bukti Bayar</th>
                                <th>Status Booking</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookingMasuk as $booking)
                            <tr>
                                <td>{{$booking->booking->id}}</td>
                                <td>
                                    {{$booking->booking->user->name}}
                                </td>
                                <td>{{$booking->kos->nama_kos}}
                                    <div class="table-links">
                                    <div class="bullet"></div>
                                    <a href="{{route('kos.detail',$booking->kos->slug)}}" class="text-warning">Detail Kos</a>
                                    </div>                                
                                </td>
                                <td>
                                    {{$booking->kamar->id}}
                                </td>
                                <td>
                                    <a href="{{Storage::url($booking->booking->bukti_bayar)}}"> Lihat Bukti</a>
                                </td>
                                <td>
                                    @if($booking->booking->status == 'menunggu')
                                        <span class="text-warning"><i>Menunggu Diproses</i></span>
                                    @elseif($booking->booking->status == 'ditolak')
                                        <span class="text-danger"><i>Telah Ditolak</i></span>
                                    @else
                                    <span class="text-success"><i>Telah Diterima</i></span>
                                    @endif
                                </td>
                                <td>
                                <!-- terima-booking/{idKost}/{idBooking} -->
                                    <a onClick="return confirm('Booking ID - {{$booking->booking->id}} Diterima ?')" href="{{url('terima-booking/' . $booking->kamar->id . '/' . $booking->booking->id . '/')}}" class="btn  btn-sm btn-primary">Terima</a>
                                    <a onClick="return confirm('Booking ID - {{$booking->booking->id}} Ditolak ?')" href="{{url('tolak-booking/' . $booking->kamar->id . '/' . $booking->booking->id . '/')}}" class="btn  btn-sm btn-danger">Tolak</a>
                                    <button  data-toggle="modal" data-target="#edit{{$booking->id}}" class="btn btn-success btn-sm">Detail</button>
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

<div class="modal fade" id="edit{{$booking->id ?? ''}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit{{$booking->id ?? ''}}">DETAIL BOOKING ID - {{$booking->booking->id ?? ''}} '</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tr>
            <th>
              <td>ok</td>
            </th>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop

@push('scripts')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endpush