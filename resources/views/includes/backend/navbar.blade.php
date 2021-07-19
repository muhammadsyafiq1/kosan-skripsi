<div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        @if(Auth::user()->roles == 'pemilik')
        <!-- pemilik -->
        <ul class="navbar-nav navbar-right">
          @php 
          $bookingMasuk = App\Models\Booking_detail::with(['booking.user','kos'])
                ->whereHas('kos', function($kos){$kos->where('user_id', \Auth::user()->id);})
                ->whereHas('booking', function($booking){$booking->where('status', '=','menunggu');})
                ->get();
          @endphp
            @if($bookingMasuk->count() > 0)
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep "><i class="far fa-bell"></i></a>
            @else
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg "><i class="far fa-bell"></i></a>
            @endif
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications {{$bookingMasuk->count()}}
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
              @foreach($bookingMasuk as $booking)
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Kos "{{$booking->kos->nama_kos}}" telah diBooking <br>
                    Oleh - {{$booking->booking->user->name}}
                    <div class="time text-primary">{{\Carbon\Carbon::createFromTimeStamp(strtotime($booking->booking->created_at))->diffForHumans()}}</div>
                  </div>
                </a>
              @endforeach
              </div>
              <div class="dropdown-footer text-center">
                <a href="{{route('booking-kos-masuk')}}">Lihat Semua <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          @if (Auth::user()->avatar)
              <img src="{{ Storage::url(Auth::user()->avatar) }}" class="rounded-circle mr-1">
          @else
              <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" height="40" class="rounded-circle mr-1" />
          @endif
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route('myProfile')}}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Setting Profile
              </a>
              <a href="{{url('/logout')}}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
        @elseif(Auth::user()->roles == 'admin')
        <!-- admin -->
        <ul class="navbar-nav navbar-right">
          @php 
            $kosBaruDaftar = App\Models\Kos::with('user')->where('status','=','nonaktif')->get();
          @endphp
            @if($kosBaruDaftar->count() > 0)
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep "><i class="far fa-bell"></i></a>
            @else
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg "><i class="far fa-bell"></i></a>
            @endif
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications {{$kosBaruDaftar->count()}}
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
              @foreach($kosBaruDaftar as $kos)
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    {{$kos->user->name}} telah mendaftarkan kos "{{$kos->nama_kos}}"
                    <div class="time text-primary">{{\Carbon\Carbon::createFromTimeStamp(strtotime($kos->created_at))->diffForHumans()}}</div>
                  </div>
                </a>
              @endforeach
              </div>
              <div class="dropdown-footer text-center">
                <a href="{{route('semua-kos')}}">Lihat Semua <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          @if (Auth::user()->avatar)
              <img src="{{ Storage::url(Auth::user()->avatar) }}" class="rounded-circle mr-1">
          @else
              <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" height="40" class="rounded-circle mr-1" />
          @endif
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route('myProfile')}}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Setting Profile
              </a>
              <a href="{{url('/logout')}}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
        @else
        <!-- member -->
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          @if (Auth::user()->avatar)
              <img src="{{ Storage::url(Auth::user()->avatar) }}" class="rounded-circle mr-1">
          @else
              <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" height="40" class="rounded-circle mr-1" />
          @endif
            <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
            <a href="{{route('myProfile')}}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Setting Profile
              </a>
              <a href="{{url('/logout')}}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
        @endif
      </nav>