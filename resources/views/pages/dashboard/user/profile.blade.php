@extends('layouts.dashboard')

@section('title')
 My Profile
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-10">
              <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <!-- <img alt="image" src="/backend/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture"> -->
                    @if (Auth::user()->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" class="rounded-circle profile-widget-picture">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ $user->name }}" height="80" class="rounded-circle profile-widget-picture" />
                    @endif
                    <br>
                    <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror"> <br>
                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    @csrf @method('put')
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Roles</div>
                        <div class="profile-widget-item-value">{{$user->roles}}</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Bergabung</div>
                        <div class="profile-widget-item-value">{{date('Y-m-d',strtotime($user->created_at))}}</div>
                      </div>
                      <div class="profile-widget-item">
                        @if($user->roles == 'pemilik')
                        <div class="profile-widget-item-label">Jumlah Kos</div>
                        <div class="profile-widget-item-value">{{$jmlKos}}</div>
                        @endif
                      </div>
                    </div>
                    <!--  -->
                  </div>
                </div>
                <div class="card" style="margin-top: -10px;">
                    <div class="row">
                        <div class="col-12">
                            @if(session('status'))
                            <div class="alert alert-warning">
                                {{session('status')}}
                            </div>
                            @endif
                        </div>
                    </div>
                  <!--  -->
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input name="email" readonly type="text" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Handphone</label>
                            <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{$user->no_hp}}" required>
                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="0" disabled selected>--Pilih--</option>
                                <option value="pria" {{$user->jenis_kelamin == 'pria' ? 'selected' : ''}}>Pria</option>
                                <option value="wanita" {{$user->jenis_kelamin == 'wanita' ? 'selected' : ''}}>Wanita</option>
                            </select>
                            @error('jenis_kelamin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{$user->alamat}}</textarea>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right" style="margin-top :-20px;">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
                <!--  -->
                <div class="card">
                    <div class="card-header card-title">
                        Ganti Password
                    </div>
                    <div class="card-body shadow">
                        <form action="{{route('gantiPassword')}}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col-12 form-group">
                                <label for="password">Password Baru</label>
                                    <input  type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password" autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 form-group">
                                <label for="password">Ulangi Password Baru</label>
                                    <input placeholder="Konfirmasi Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@stop