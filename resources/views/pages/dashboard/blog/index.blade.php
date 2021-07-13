@extends('layouts.dashboard')

@section('title')
    Kelola Blogger
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">kelola Blogger</div>
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
                                <th>Author</th>
                                <th>Title</th>
                                <th>Gambar</th>
                                <th>Slug</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{$blog->author}}
                                    <form action="{{route('blog.destroy',$blog->id)}}" method="post">
                                        @csrf @method('delete')
                                        <div class="table-links">
                                        <div class="bullet"></div>
                                        <a href="{{route('blog.edit',$blog->id)}}">Edit</a>
                                        <div class="bullet"></div>
                                        <button onClick="return confirm('Are You Sure ?')" type="submit" class="text-danger btn btn-sm">Trash</button>
                                        </div>
                                    </form>                                   
                                </td>
                                <td>
                                    {{$blog->title}}
                                </td>
                                <td>
                                    <img src="{{Storage::url($blog->gambar)}}" alt="" style="width:100px;">
                                </td>
                                <td>
                                    {{$blog->slug}}
                                </td>
                                <td>
                                    {{$blog->kategori}}
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
  <div class="modal-dialog dialog-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Penulis</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author">
                @error('author')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                @error('gambar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="kategori">kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                @error('kategori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="Isi">Isi</label>
                <textarea name="isi" id="editor"></textarea>
                @error('isi')
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