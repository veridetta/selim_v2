
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Kegiatan Anggota')

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
      <div class="col-lg-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header bg-light-primary flex-column align-items-start">
            <div class="row col-12">
                <div class="col-lg-1 col-2">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                          <i data-feather="activity" class="font-medium-5"></i>
                        </div>
                      </div>
                </div>
                <div class="col-lg-11 col-10 my-auto">
                    <p class="h4 card-text">Daftar Kegiatan</p>
                </div>
            </div>
          </div>
          <div class="card-body" bis_skin_checked="1">
            @foreach ($data as $datas)
            <?php 
              $k = array_rand($val);
              $timestamp = strtotime($datas->tanggal);
              $day = $result = substr(date('l', $timestamp), 0, 3);
            ?>
              <div class="card card-user-timeline mb-0">
                <div class="card-body pb-0">
                    <ul class="timeline ms-50">
                      <li class="timeline-item pb-0">
                          <span class="timeline-point timeline-point-{{$val[$k]}} timeline-point-indicator"></span>
                          <div class="timeline-event">
                            <div class="card card-developer-meetup pt-0 ps-0 mb-0">
                                <div class="card-body pt-0 ps-0 pb-0">
                                  <div class="meetup-header d-flex align-items-center  pt-0 ps-0">
                                    <div class="meetup-day">
                                      <h6 class="mb-0 text-uppercase">{{$day}}</h6>
                                      <h4 class="mb-0">{{date('d',$timestamp)}}</h4>
                                      <h6 class="mb-0">{{date('Y',$timestamp)}}</h6>
                                    </div>
                                    <div class="my-auto">
                                      <h5 class="card-title mb-25">{{$datas->judul}}</h5>
                                      <p class="card-text mb-0">{{$datas->isi}}</p>
                                      <div class="d-flex flex-row meetings">
                                        <div class="avatar bg-light-primary rounded me-1">
                                          <div class="avatar-content">
                                            <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                          </div>
                                        </div>
                                        <div class="content-body">
                                          <h6 class="mb-0">{{$datas->tempat}}</h6>
                                          <small>{{$datas->alamat}}</small>
                                        </div>
                                      </div>
                                    </div>
                                    
                                  </div>
                                </div>
                            </div>
                          </div>
                      </li>
                    </ul>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
</section>
<!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/moment.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
@endsection
