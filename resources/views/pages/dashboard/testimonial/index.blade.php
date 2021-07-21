@extends('layouts.dashboard')

@section('title')
    Kelola Testimonial
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">Testimonial</div>
            </div>
          </div>
          <div class="section-body">
            <div class="section-header-button mb-3">
              <p>Kos Dibawah Adalah Kos Yang Telah / Sedang Anda Singgahi. Berikan Testimonial Anda Untuk Membantu Pemilik kos.</p>
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
                                <th>Gambar Kos</th>
                                <th>Nama Kos</th>
                                <th>Pemilik Kos</th>
                                <th>Avatar Pemilik Kos</th>
                                <th>Testimonial</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                            <tr>
                                <td>
                                    <img src="{{Storage::url($testimonial->kos->gallery->first()->gambar ?? '')}}" alt="" style="width: 100px;">
                                </td>
                                <td>{{$testimonial->kos->nama_kos}}</td>
                                <td>{{$testimonial->kos->user->email}} <br> <small>{{$testimonial->kos->user->no_hp}}</small></td>
                                <td>
                                @if ($testimonial->kos->user->avatar)
                                    <img src="{{ Storage::url($testimonial->kos->user->avatar) }}" class="rounded-circle mr-1">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ $testimonial->kos->user->name }}" height="40" class="rounded-circle mr-1" />
                                @endif
                                </td>
                                <td>
                                  @if($testimonial->testimonial)
                                    {{$testimonial->testimonial}}
                                  @else
                                    Belum Ada Testimonial
                                  @endif
                                </td>
                                <td>
                                    @if($testimonial->testimonial)
                                      <span class="text-success">
                                      <i class="fa fa-check"> Selesai</i>
                                      </span>
                                    @else
                                    <form action="{{route('testimonial.update',$testimonial->id)}}" method="post">
                                      @csrf @method('put')
                                      <input type="text"  id="" class="form-control" placeholder="Berikan Testimonial..." name="testimonial">
                                      <button class="btn btn-sm btn-secondary mt-1 float-right">Sumbit</button>
                                    </form>
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