@extends('layouts.dashboard')

@section('title')
    Kelola User
@stop

@section('content')
<section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
              <div class="breadcrumb-item">Semua Pengguna</div>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Hp</th>
                                <th>Alamat</th>
                                <th>Roles</th>
                                <th>Bergabung</th>
                                <th>Avatar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}
                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf @method('delete')
                                        <div class="table-links">
                                        <div class="bullet"></div>
                                        <button onClick="return confirm('Are You Sure ?')" type="submit" class="text-danger btn btn-sm">Trash</button>
                                        </div>
                                    </form>                                   
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->no_hp}}
                                </td>
                                <td>
                                    {{$user->alamat}}
                                </td>
                                <td>
                                    @if($user->roles == 'pemilik')
                                        <div class="badge badge-primary">{{$user->roles}}</div>
                                    @elseif($user->roles == 'member')
                                        <div class="badge badge-warning">{{$user->roles}}</div>
                                    @elseif($user->roles == 'admin')
                                        <div class="badge badge-success">{{$user->roles}}</div>
                                    @endif
                                </td>
                                <td>{{date('y-m-d',strtotime($user->created_at))}}</td>
                                <td>
                                @if ($user->avatar)
                                    <img src="{{ Storage::url(Auth::user()->avatar) }}" class="rounded-circle mr-1">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ $user->name }}" height="40" class="rounded-circle mr-1" />
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