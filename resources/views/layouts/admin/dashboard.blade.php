
@extends('layouts/contentLayoutMaster')

@section('title', 'Beranda')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  @include('panels.flash')
      <!-- Greetings Card starts -->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-profile">
          <img src="{{asset('images/logo/bg.jpg')}}" class="img-fluid card-img-top" alt="Profile Cover Photo">
          <div class="card-body text-center">
            <div class="profile-image-wrapper" bis_skin_checked="1">
              <div class="profile-image" bis_skin_checked="1">
                <div class="avatar bg-white" bis_skin_checked="1">
                  <img src="{{asset('images/logo/logo.png')}}" alt="Profile Picture">
                </div>
              </div>
            </div>
            <h3>PT SELIM ELEKTRO</h3>
              <h6 class="text-muted">Losari Brebes - Jawa Tengah</h6>
              <hr class="mb-2">
              <div class="d-flex justify-content-between align-items-center" bis_skin_checked="1">
                <div>
                  <h6 class="text-danger text-start fw-bolder">Tentang Perusahaan</h6>
                  <p class="text-start">PT. Selim Elektro adalah perusahaan PMA asal Korea Selatan yang bergerak dalam bidang perakitan sparepart Wire Harness untuk Samsung Elektronik, lokasi gedung atau pabrik di Desa Kecipir RT. 002 Rw. 002 Kec. Losari Kab Brebes - Jawa Tengah.</p>
                </div>
              </div>
          </div>
          <div class="card-footer">
            <div class="d-flex flex-row meetings" bis_skin_checked="1">
              <div class="avatar bg-light-danger rounded me-1" bis_skin_checked="1">
                <div class="avatar-content" bis_skin_checked="1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin avatar-icon font-medium-3"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
              </div>
              <div class="content-body text-start" bis_skin_checked="1">
                <h6 class="mb-0">PT. Selim Elektro</h6>
                <small>Desa Kecipir RT. 002 Rw. 002 Kec. Losari Kab Brebes - Jawa Tengah</small>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->

@endsection
