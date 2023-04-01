<li class="navigation-header">
    <span>Menu</span>
    <i data-feather="more-horizontal"></i>
  </li>
@if (auth()->user()->role=='pelamar')
<li class="nav-item">
    <a href="{{route('dashboard-user')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="home"></i>
        <span class="menu-title text-truncate">Beranda</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('data-pelamar')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="briefcase"></i>
        <span class="menu-title text-truncate">Lamaran</span>
    </a>
</li>
@elseif (auth()->user()->role=='karyawan')
<li class="nav-item">
    <a href="{{route('dashboard-user')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="home"></i>
        <span class="menu-title text-truncate">Dahsboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('profil-karyawan')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="user"></i>
        <span class="menu-title text-truncate">Profil Karyawan</span>
    </a>
</li>
<li class="nav-item has-sub {{(request()->is('karyawan/a/*'))? ' open' : ''}}">
    <a href="#" class="d-flex align-items-center" target="_self">
        <i data-feather="check-circle"></i>
        <span class="menu-title text-truncate">Absensi Karyawan</span>
    </a>
    <ul class="menu-content">
        <li class="{{(request()->is('karyawan/a/absensi'))? 'active' : ''}}">
            <a href="{{route('absensi-karyawan')}}" class="d-flex align-items-center" target="_self">
                <i data-feather="check-circle"></i>
                <span class="menu-title text-truncate">Absensi</span>
            </a>
        </li>
        <li class="{{(request()->is('karyawan/a/cuti'))? 'active' : ''}}">
            <a href="{{route('cuti-karyawan')}}" class="d-flex align-items-center" target="_self">
                <i data-feather="users"></i>
                <span class="menu-title text-truncate">Izin Absen</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{route('lembur-karyawan')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="clock"></i>
        <span class="menu-title text-truncate">Lembur Karyawan</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('gaji-karyawan',['bulan'=>'01','tahun'=>'2022'])}}" class="d-flex align-items-center" target="_self">
        <i data-feather="credit-card"></i>
        <span class="menu-title text-truncate">Slip Gaji</span>
    </a>
</li>
@elseif (auth()->user()->role=='admin')
<li class="nav-item">
    <a href="{{route('dashboard-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="home"></i>
        <span class="menu-title text-truncate">Dahsboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('karyawan-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="briefcase"></i>
        <span class="menu-title text-truncate">Data Karyawan</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('jabatan-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="briefcase"></i>
        <span class="menu-title text-truncate">Jabatan Master</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('absensi-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="check-circle"></i>
        <span class="menu-title text-truncate">Data Absensi</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('lembur-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="clock"></i>
        <span class="menu-title text-truncate">Data Lembur</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('gaji-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="credit-card"></i>
        <span class="menu-title text-truncate">Gaji</span>
    </a>
</li>
@elseif (auth()->user()->role=='pimpinan')
<li class="nav-item">
    <a href="{{route('dashboard-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="home"></i>
        <span class="menu-title text-truncate">Dahsboard</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('karyawan-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="briefcase"></i>
        <span class="menu-title text-truncate">Data Karyawan</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('absensi-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="check-circle"></i>
        <span class="menu-title text-truncate">Data Absensi</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('gaji-admin')}}" class="d-flex align-items-center" target="_self">
        <i data-feather="credit-card"></i>
        <span class="menu-title text-truncate">Data Gaji</span>
    </a>
</li>
@endif