<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Kosan<span class="text-success">Juragan</span></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KJ</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Menu</li>
              @if(Auth::user()->roles == 'admin')
              <li><a class="nav-link" href="{{route('user.index')}}"><i class="fa fa-users"></i> <span>Kelola Pengguna</span></a></li>
              <li><a class="nav-link" href="{{route('semua-kos')}}"><i class="fa fa-home"></i> <span>Semua Kos</span></a></li>
              <li><a class="nav-link" href="{{route('fasilitas.index')}}"><i class="fa fa-list"></i> <span>Kelola Fasilitas</span></a></li>
              <li><a class="nav-link" href="{{route('blog.index')}}"><i class="fa fa-list"></i> <span>Kelola Blog</span></a></li>
              @elseif(Auth::user()->roles == 'pemilik')
              <li><a class="nav-link" href="{{route('kos.index')}}"><i class="fa fa-home"></i> <span>Kelola Kos</span></a></li>
              <li><a class="nav-link" href="{{route('fasilitas.index')}}"><i class="fa fa-list"></i> <span>Kelola Fasilitas</span></a></li>
              <li><a class="nav-link" href="{{route('booking-kos-masuk')}}"><i class="fa fa-list"></i> <span>Booking Kos Masuk</span></a></li>
              <li><a class="nav-link" href="{{route('bank.index')}}"><i class="fa fa-credit-card"></i> <span>Kelola Rekening</span></a></li>
              @else
              <li><a class="nav-link" href="{{route('riwayat-kos-saya')}}"><i class="fa fa-list"></i> <span>Riwayat Kos Saya</span></a></li>
              <li><a class="nav-link" href="{{route('kos-tersimpan.index')}}"><i class="fa fa-heart"></i> <span>Kos Favorit</span></a></li>
              @endif
            </ul>
        </aside>
      </div>