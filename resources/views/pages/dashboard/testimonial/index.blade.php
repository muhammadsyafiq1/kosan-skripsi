@extends('layouts.dashboard')

@section('title')
    Kelola Testimonial
@stop

@section('content')

<style>
  .rating-css div {
      color: #ffe400;
      font-size: 30px;
      font-family: sans-serif;
      font-weight: 800;
      text-align: center;
      text-transform: uppercase;
      padding: 20px 0;
  }
  .rating-css input {
      display: none;
  }
  .rating-css input + label {
      font-size: 50px;
      text-shadow: 1px 1px 0 #8f8420;
      cursor: pointer;
  }
  .rating-css input:checked + label ~ label {
      color: #b4afaf;
  }
  .rating-css label:active{
      transform: scale(0.8);
      transition: 0.3s ease;
  }
  .checked{
    color: #ffd900;
  }
</style>
<!-- end star css -->


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
                        <th>Penilaian</th>
                        <th>Penilaian</th>
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
                            {{$testimonial->testimonial}} <br>
                            @for($i = 1; $i <= $testimonial->stars_rated; $i++)
                              <i style="font-size: 10px;"  class="fa fa-star checked"></i> 
                            @endfor
                          @else
                            Belum Ada Testimonial Dan Rating
                          @endif
                        </td>
                        <td>
                          @if($testimonial->stars_ra)
                        <a href="javascript:void()"
                              data-id="{{$testimonial->id}}"
                              data-kos_id="{{$testimonial->kos->id}}"
                              data-nama_kos="{{$testimonial->kos->nama_kos}}"
                              type="button"
                              class="btn btn-sm  btn-warning button-update"
                              >
                              Beri penilaian
                          </a>
                        </td>
                        <!-- <td>
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
                        </td> -->
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

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Berikan review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('create-testimonial-rating')}}" method="post" enctype="multipart/form-data">
        @csrf 
            <div class="modal-body">
                <div class="form-group">
                    
                    <input type="hidden" name="kos_id" id="kos_id" class="form-control kos_id" readonly>
                    <input type="hidden" name="id" id="id" class="form-control id" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nama kos</label>
                    <input type="text" name="nama_kos" id="nama_kos" class="form-control nama_kos" readonly>
                </div>
                <div class="rating-css">
                    <div class="star-icon">
                        <input type="radio" name="stars_rated" value="1" checked id="rating1">
                        <label for="rating1" class="fa fa-star" ></label>
                        <input type="radio" name="stars_rated" value="2" id="rating2">
                        <label for="rating2" class="fa fa-star" ></label>
                        <input type="radio" name="stars_rated" value="3" id="rating3">
                        <label for="rating3" class="fa fa-star" ></label>
                        <input type="radio" name="stars_rated" value="4" id="rating4">
                        <label for="rating4" class="fa fa-star" ></label>
                        <input type="radio" name="stars_rated" value="5 " id="rating5">
                        <label for="rating5" class="fa fa-star" ></label>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="name">Testimonial</label>
                    <textarea required name="testimonial" id="3" cols="2" rows="2" class="form-control"> </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" class="id" >
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
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

<script>
    $('#table_id').on('click','.button-update', function(){
        let id = $(this).data('id');
        let kos_id = $(this).data('kos_id');
        let nama_kos = $(this).data('nama_kos');

        $('#edit-modal').modal('show');
        $('.nama_kos').val(nama_kos);
        $('.kos_id').val(kos_id);
        $('.id').val(id);
    })
</script>
@endpush