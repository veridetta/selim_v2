<div class="content-header row">
  <div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="col-12">
        <h2 class="content-header-title float-start mb-0">@yield('title')</h2>
        <div class="breadcrumb-wrapper">
          @if(@isset($breadcrumbs))
          <ol class="breadcrumb">
              {{-- this will load breadcrumbs dynamically from controller --}}
              @foreach ($breadcrumbs as $breadcrumb)
              <li class="breadcrumb-item">
                  @if(isset($breadcrumb['link']))
                  <a href="{{ $breadcrumb['link'] == 'javascript:void(0)' ? $breadcrumb['link']:url($breadcrumb['link']) }}">
                      @endif
                      {{$breadcrumb['name']}}
                      @if(isset($breadcrumb['link']))
                  </a>
                  @endif
              </li>
              @endforeach
          </ol>
          @endisset
        </div>
      </div>
    </div>
  </div>
  <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
    <div class="mb-1 breadcrumb-right">
      <div class="dropdown">
        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i data-feather="grid"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="{{route('dashboard-admin')}}">
            <i class="me-1" data-feather="info"></i>
            <span class="align-middle">Informasi</span>
          </a>
          <a class="dropdown-item" href="{{route('kegiatan-admin')}}">
            <i class="me-1" data-feather="activity"></i>
            <span class="align-middle">Kegiatan</span>
          </a>
          <a class="dropdown-item" href="{{route('pengunduran-admin')}}">
            <i class="me-1" data-feather="user-minus"></i>
            <span class="align-middle">Pengunduran Diri</span>
          </a>
          <a class="dropdown-item" href="{{route('anggota-admin')}}">
            <i class="me-1" data-feather="users"></i>
            <span class="align-middle">Data Anggota</span>
          </a>
          <a class="dropdown-item" href="{{route('keluhan-admin')}}">
            <i class="me-1" data-feather="message-square"></i>
            <span class="align-middle">Keluhan Anggota</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
