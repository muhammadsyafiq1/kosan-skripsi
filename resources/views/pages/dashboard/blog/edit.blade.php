@extends('layouts.dashboard')

@section('title')
    Edit Blog
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb">{{$blog->title}}</div>
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
                        <div class="card-title">Edit Bank - {{$blog->title}}</div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                            @csrf @method('put')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title') ? old('title') : $blog->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{old('author') ? old('author') : $blog->author}}">
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" value="{{old('kategori') ? old('kategori') : $blog->kategori}}">
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">gambar</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"> <br>
                            @error('gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <i>Kosongkan Inputan Jika tidak ingin rubah gambar.</i>
                            <br>
                            <img src="{{Storage::url($blog->gambar)}}" alt="" style="width: 200px;"> <br>
                        </div>
                        <div class="form-group">
                            <label for="Isi">Isi</label>
                            <textarea required name="isi" id="editor">{!!$blog->isi!!}</textarea>
                            @error('Isi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn btn-sm btn-block text-center btn-success" type="submit">Ubah</button>
                        <a href="{{route('blog.index')}}" class="btn btn-sm btn-block text-center btn-secondary" type="submit">Kembali</a>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@stop