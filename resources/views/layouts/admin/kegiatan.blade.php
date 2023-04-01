
@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard KegiatanAdmin')

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
        <button class="dt-button add-new btn btn-primary mb-2"  aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Tambah Kegiatan</span></button>
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
       <!-- Modal to add new user starts-->
      <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
        <div class="modal-dialog">
          <form class="add-new-user modal-content pt-0" method="POST" action="{{route('kegiatan-add-admin')}}">
            @csrf
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
            </div>
            <div class="modal-body flex-grow-1">
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-title">Judul Kegiatan</label>
                <input
                  type="text"
                  class="form-control dt-title"
                  id="basic-icon-default-title"
                  placeholder="Rapat"
                  name="info_judul"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-document">Isi</label>
                <textarea
                  type="text"
                  id="basic-icon-default-document"
                  class="form-control dt-document"
                  placeholder="Isi Informasi"
                  name="info_isi"></textarea>
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-calendar">Tanggal dibuat</label>
                <input
                  type="date"
                  id="basic-icon-default-calendar"
                  class="form-control dt-date"
                  placeholder="12/02/2022"
                  name="info_tanggal"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-location">Nama Tempat</label>
                <input
                  type="text"
                  id="basic-icon-default-location"
                  class="form-control dt-location"
                  placeholder="PT Dharma Indonesia"
                  name="info_tempat"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-address">Alamat</label>
                <input
                  type="text"
                  id="basic-icon-default-address"
                  class="form-control dt-address"
                  placeholder="Jl Majalengka 2"
                  name="info_alamat"
                />
              </div>
              <button type="submit" class="btn btn-primary me-1 data-submit">Submit</button>
              <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
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
