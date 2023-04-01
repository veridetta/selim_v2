@if ($configData['mainLayoutType'] === 'horizontal' && isset($configData['mainLayoutType']))
<nav
class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center {{ $configData['navbarColor'] }}"
data-nav="brand-center">
<div class="navbar-header d-xl-block d-none">
  
</div>
@else
    <nav
      class="header-navbar navbar navbar-expand-lg align-items-center {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }} {{ $configData['layoutWidth'] === 'boxed' && $configData['verticalMenuNavbarType'] === 'navbar-floating'? 'container-xxl': '' }}">
@endif
<div class="navbar-container d-flex content">
  <div class="bookmark-wrapper d-flex align-items-center">
    <ul class="nav navbar-nav d-xl-none">
      <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
            data-feather="menu"></i></a></li>
    </ul>
    <ul class="nav navbar-nav bookmark-icons">
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('dashboard-user') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Informasi"><i class="ficon"
            data-feather="info"></i> Informasi</a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('kegiatan-user') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kegiatan"><i class="ficon"
            data-feather="activity"></i> Kegiatan</a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('pengunduran-user') }}"
          data-bs-toggle="tooltip" data-bs-placement="bottom" title="Pengunduran Diri"><i class="ficon" data-feather="user-minus"></i> Pengunduran Diri</a></li>
      <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('keluhan-user') }}"
              data-bs-toggle="tooltip" data-bs-placement="bottom" title="Keluhan Anggota"><i class="ficon"
                data-feather="message-square"></i> Keluhan Anggota</a></li>
            
    </ul>
  </div>
  <ul class="nav navbar-nav align-items-center ms-auto">
    <li class="nav-item">
      <a class="navbar-brand" href="{{ url('/') }}">
        <span class="brand-logo">
          <img src="{{asset('images/logo/logo.png')}}" alt="avatar" width="38" height="38"
          />  <img src="{{asset('images/logo/spsi.png')}}" alt="avatar" width="38" height="38"
          />
      </a>
    </li>
    <li class="nav-item dropdown dropdown-user">
      <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);"
        data-bs-toggle="dropdown" aria-haspopup="true">
        <div class="user-nav d-sm-flex d-none">
          <span class="user-name fw-bolder">
            @if (Auth::check())
              {{ Auth::user()->role }}
            @else
              John Doe
            @endif
          </span>
          <span class="user-status">
            Admin
          </span>
        </div>
        <span class="avatar">
          <img class="round"
            src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('images/portrait/small/avatar-s-11.jpg') }}"
            alt="avatar" height="40" width="40">
          <span class="avatar-status-online"></span>
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
        <h6 class="dropdown-header">Manage Profile</h6>
        <div class="dropdown-divider"></div>
        @if (Auth::check())
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="me-50" data-feather="power"></i> Logout
          </a>
          <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
          </form>
        @else
          <a class="dropdown-item" href="{{ Route::has('login') ? route('login') : 'javascript:void(0)' }}">
            <i class="me-50" data-feather="log-in"></i> Login
          </a>
        @endif
      </div>
    </li>
  </ul>
</div>
</nav>
<!-- END: Header-->
