<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Kelola Penggunna</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-transparent.html">Pengguna Nonaktif</a></li>
                </ul>
              </li>
              <li><a class="nav-link" href="{{route('user.index')}}"><i class="fas fa-users"></i> <span>Kelola Pengguna</span></a></li>
            </ul>
        </aside>
      </div>