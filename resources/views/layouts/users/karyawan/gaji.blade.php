
@extends('layouts/contentLayoutMaster')

@section('title', 'Slip Gaji')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <?php use Carbon\Carbon;$p=0;?>
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
        @if ($data)
        <div class="d-flex justify-content-start">
          <label for="filter" class="pe-2 my-auto">Pilih bulan :</label>
          <div class="w-10 pe-2 my-auto">
            <select name="filter" id="filter" class="pe-2 w-10 select2 form-select">
              @foreach ($months as $month)
                <option>{{Carbon::parse($month[$p]->tanggal)->format('m-Y')}}</option>
                <?php $p++;?>
              @endforeach
            </select>
          </div>
          <button id="btn-add" class="my-2 pe-2 dt-button add-new btn btn-danger mb-2"><span>Tampilkan</span></button>
          <a href="" id="link_slip" class="d-none">Clcik this</a>
        </div>
        @endif
        <div class="card">
          <div class="card-header bg-danger flex-column align-items-start">
            <div class="row col-12">
                <div class="col-lg-1 col-2">
                    <div class="avatar bg-light p-50 m-0">
                        <div class="avatar-content text-danger">
                          <i data-feather="pocket" class="font-medium-5"></i>
                        </div>
                      </div>
                </div>
                <div class="col-lg-11 col-10 my-auto">
                    <p class="h4 card-text text-white">Slip Gaji</p>
                </div>
            </div>
          </div>
          <div class="card-body" >
            <?php use Illuminate\Http\Request;
             $dat = explode('/',request()->getrequestUri());
            ?>
            @if ($data)
            @if ($dat[3])
              <div class="card-datatable table-responsive pt-3">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item col-12" height="500" id="pdf_src" src="//{{request()->getHttpHost()}}/karyawan/slip/{{$dat[3]}}/{{$dat[4]}}/no" allowfullscreen></iframe>
                </div>
              </div>
            @endif
            @else
            <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
              <div class="alert-body">
                  <strong>Anda belum melengkapi profil</strong><span>Silahkan lengkapi terlebih dahulu</span>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
          </div>
          @if ($dat[3])
            <div class="card-footer">
              <div class="col-12 d-flex justify-content-end">
                <a id="btn-add" class="my-2 pe-2 dt-button add-new btn btn-danger mb-2" href="//{{request()->getHttpHost()}}/karyawan/slip/{{$dat[3]}}/{{$dat[4]}}/download" "><span>Download</span></a>
              </div>
            </div>
          @endif
        </div>
      </div>
</section>
<!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
@endsection
@section('page-script')
<script>
  $("#btn-add").click(function(){
    var bt = $("#filter").val().split("-");
    var locat = "//{{request()->getHttpHost()}}/karyawan/gaji/"+bt[0]+"/"+bt[1];
    $("#link_slip").attr("href",locat);
    setTimeout(() => {
      $("#link_slip")[0].click();
    }, 500);
  })
</script>

@endsection
