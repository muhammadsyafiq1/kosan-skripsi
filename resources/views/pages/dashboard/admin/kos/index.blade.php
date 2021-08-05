@extends('layouts.dashboard')

@section('title')
    Semua Kos
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div> 
              <div class="breadcrumb">Semua Kos</div>
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
                                <th>ID kos</th>
                                <th>Nama Kos</th>
                                <th>Pemilik Kos</th>
                                <th>Kontak Pemilik</th>
                                <th>Alamat Kos</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kosan as $kos)
                            <tr>
                                <td><div class="badge badge-success">{{$kos->id}}</div>
                                    <form action="{{route('fasilitas.destroy',$kos->id)}}" method="post">
                                        @csrf @method('delete')
                                        <div class="table-links">
                                        <div class="bullet"></div>
                                        <a href="{{route('fasilitas.edit',$kos->id)}}">Edit</a>
                                        <div class="bullet"></div>
                                        <button onClick="return confirm('Are You Sure ?')" type="submit" class="text-danger btn btn-sm">Trash</button>
                                        </div>
                                    </form>                                   
                                </td>
                                <td>
                                    {{$kos->nama_kos}}
                                </td>
                                <td>
                                    {{$kos->user->name}}
                                </td>
                                <td class="text-warning">
                                    {{$kos->user->no_hp}}
                                </td>
                                <td>
                                    {{$kos->alamat}}
                                </td>
                                <td style="font-weight:bold;">
                                    @if($kos->status == 'aktifkan')
                                      <span class="text-success"> <i class="fa fa-check"></i></span>
                                    @else
                                      <span class="text-danger"> <i class="fa fa-times"></i></span>
                                    @endif
                                </td>
                                <td>
                                    @if($kos->status == 'aktifkan')
                                      <a onclick="return confirm('{{$kos->nama_kos}} Akan Dinonaktifkan ?')" href="{{route('kos.nonaktifkan',$kos->id)}}" class="btn btn-sm btn-danger">Non Aktifkan</a>
                                    @else
                                      <a onclick="return confirm('{{$kos->nama_kos}} Akan Diaktifkan ?')" href="{{route('kos.aktifkan',$kos->id)}}" class="btn btn-sm btn-primary">Aktifkan</a>
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