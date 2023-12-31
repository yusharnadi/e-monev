<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('dashboard')}}"><img class="mr-1" src="{{asset('landing/images/logo-siperkasa.png')}}" alt="Logo Pemkot Singkawang" srcset="" height="50px">
        {{config('app.name')}}
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dashboard')}}">
        <img src="{{asset('landing/images/logo-siperkasa.png')}}" alt="Logo Pemkot" srcset="" height="50px">
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="{{set_active('dashboard')}}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-laptop"></i><span>Dashboard</span></a></li>

      {{-- @can("read user") --}}
      <li class="menu-header">PDAM</li>
      {{-- @endcan --}}
        <li class="{{set_active('monev.pdam.*')}}"><a class="nav-link" href="{{ route('monev.pdam.index') }}"><i class="fas fa-file-invoice"></i><span>Monitoring & Evaluasi</span></a></li>
        <li class="{{set_active('kinerja.*')}}"><a class="nav-link" href="{{ route('kinerja.index') }}"><i class="fas fa-file-signature"></i><span>Kinerja PDAM</span></a></li>
        <li class="{{set_active('laporan-triwulan.*')}}"><a class="nav-link" href="{{ route('laporan-triwulan.index') }}"><i class="fas fa-file-upload"></i><span>Laporan Triwulan</span></a></li>
        <li class="{{set_active('pdam-report.*')}}"><a class="nav-link" href="{{ route('pdam-report.index') }}"><i class="fas fa-file-upload"></i><span>Laporan Bulanan</span></a></li>
        {{-- <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tint"></i> <span>PDAM</span></a>
          <ul class="dropdown-menu" style="display: block;">
            <li class="{{set_active('kinerja.*')}}"><a class="nav-link" href="layout-default.html">Monitoring & Evaluasi</a></li>
            <li class="{{set_active('kinerja.*')}}"><a class="nav-link" href="{{ route('kinerja.index') }}">Laporan Kinerja</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Laporan Bulanan</a></li>
          </ul>
        </li> --}}
      <li class="menu-header">BUMD LAIN</li>
      <li class=""><a class="nav-link" href="#"><i class="fas fa-book"></i><span>Monitoring & Evaluasi</span></a></li>
      <li class=""><a class="nav-link" href="#"><i class="fas fa-book"></i><span>Kinerja</span></a></li>
      <li class=""><a class="nav-link" href="#"><i class="fas fa-book"></i><span>Laporan</span></a></li>


      @can("read user")
      <li class="menu-header">Master Data</li>
      @endcan

      @can("read user")
      <li class="{{set_active('users.*')}}"><a class="nav-link" href="{{ route('users.index') }}"><i class="far fa-user"></i><span>Users</span></a></li>
      @endcan

      @can("read role")
      <li class="{{set_active('role.*')}}"><a class="nav-link" href="{{ route('role.index') }}"><i class="fas fa-user-tag"></i><span>Role</span></a></li>
      @endcan
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="{{ route('home') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-globe"></i> Lihat Beranda
      </a>
      <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split">
        <i class="fas fa-sign-out-alt"></i> Logout
      </a>
    </div>
  </aside>
</div>
