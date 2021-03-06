<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{url('/')}}">Kosan<span class="color-b">Juragan</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('object-kos')) ? 'active' : '' }}" href="{{route('object-kos.index')}}">Kos-kosan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('lihat-semua-blog')) ? 'active' : '' }}" href="{{route('lihat-semua-blog')}}">Semua Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('browse')) ? 'active' : '' }}" href="{{route('browse')}}">Browse By</a>
          </li>
          @auth
          <li class="nav-item">
            <a class=" nav-link text-muted " href="{{route('home')}}"><i class="fa fa-user"></i> Dashboard</a>
          </li>
          @else
          <li class="nav-item">
            <a class=" btn btn-sm btn-warning " href="{{route('login')}}">Masuk</a>
          </li>
          <li class="nav-item float-right">
            <a class=" btn btn-sm btn-secondary float-right" href="{{route('register')}}">Daftar</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>