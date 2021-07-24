@extends('layouts.dashboard')

@section('title')
    Kelola fasilitas
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div> 
              <div class="breadcrumb">Semua fasilitas</div>
            </div>
          </div>
          <div class="section-body">
            <div class="section-header-button mb-3">
              <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Fasilitas Baru</button>
            </div>
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
                                <th>Nama Fasilitas</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fasilitas as $fasilitas)
                            <tr>
                                <td>{{$fasilitas->nama_fasilitas}}
                                    <form action="{{route('fasilitas.destroy',$fasilitas->id)}}" method="post">
                                        @csrf @method('delete')
                                        <div class="table-links">
                                        <div class="bullet"></div>
                                        <a href="{{route('fasilitas.edit',$fasilitas->id)}}">Edit</a>
                                        <div class="bullet"></div>
                                        <button onClick="return confirm('Are You Sure ?')" type="submit" class="text-danger btn btn-sm">Trash</button>
                                        </div>
                                    </form>                                   
                                </td>
                                <!-- <td>
                                    @if ($fasilitas->icon)
                                        <img src="{{ Storage::url($fasilitas->icon) }}" class="rounded-circle mr-1" style="width:80px;">
                                    @else
                                        <img src="https://ui-avatars.com/api/?name={{ $fasilitas->nama_fasilitas }}" height="60" class="rounded-circle mr-1" />
                                    @endif
                                </td> -->
                                <td>
                                    {{$fasilitas->keterangan}}
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Rekening</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('fasilitas.index')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_fasilitas">Nama Fasilitas</label>
                <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas">
                @error('nama_fasilitas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon">
                @error('icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                @error('keterangan')
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
@stop

@push('scripts')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
@endpush