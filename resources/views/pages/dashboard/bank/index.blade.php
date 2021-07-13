@extends('layouts.dashboard')

@section('title')
    Kelola Fasilitas
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">Semua Bank</div>
            </div>
          </div>
          <div class="section-body">
            <div class="section-header-button mb-3">
              <button href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New</button>
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
                                <th>Nama Pemilik</th>
                                <th>Nomor Rekening</th>
                                <th>Nama Bank</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banks as $bank)
                            <tr>
                                <td>{{$bank->nama_nasabah}}
                                    <form action="{{route('bank.destroy',$bank->id)}}" method="post">
                                        @csrf @method('delete')
                                        <div class="table-links">
                                        <div class="bullet"></div>
                                        <a href="{{route('bank.edit',$bank->id)}}">Edit</a>
                                        <div class="bullet"></div>
                                        <button onClick="return confirm('Are You Sure ?')" type="submit" class="text-danger btn btn-sm">Trash</button>
                                        </div>
                                    </form>                                   
                                </td>
                                <td>
                                    {{$bank->no_rek}}
                                </td>
                                <td>
                                    {{$bank->nama_bank}}
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
        <form action="{{route('bank.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama_nasabah">Nama Pemilik</label>
                <input type="text" class="form-control" id="nama_nasabah" name="nama_nasabah">
            </div>
            <div class="form-group">
                <label for="nama_bank">Nama Bank</label>
                <input type="text" name="nama_bank" class="form-control" id="nama_bank">
            </div>
            <div class="form-group">
                <label for="no_rek">Nomor Rekekning</label>
                <input type="number" name="no_rek" class="form-control" id="no_rek">
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