
@extends('layouts/contentLayoutMaster')

@section('title', 'Pengunduran Diri')

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
                    <p class="h4 card-text text-white">Pengunduran Diri</p>
                </div>
            </div>
          </div>
          <div class="card-body " >
            @if ($mundur)
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item col-12" height="500" id="pdf_src" src="{{ asset('/storage/files/').'/'.$mundur->file }}" allowfullscreen></iframe>
            </div>
            @else
            <div class="col-12 d-flex justify-content-center">
              <button id="btn-add" class="mt-3 dt-button add-new btn btn-danger mb-2"  
              aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#backdrop"><span>Buat Surat Pengunduran</span></button>
            </div>
            @endif
          </div>
          @if ($mundur)
            <div class="card-footer">
              <div class="col-12 d-flex justify-content-end">
                <a id="btn-add" class="my-2 pe-2 dt-button add-new btn btn-danger mb-2" href="{{route('mundur-download-karyawan')}}" "><span>Download</span></a>
              </div>
            </div>
          @endif
        </div>
      </div>
      <!-- Modal to add new user starts-->
      <div class="modal modal-danger fade text-start" id="backdrop" tabindex="-1" aria-labelledby="myModalLabel4"data-bs-backdrop="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel4">Buat Surat Pengunduran</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="add-new-user pt-0" method="POST" action="{{route('mundur-add-karyawan')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_users" value="{{auth()->user()->id}}"/>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-nip">NIP</label>
                  <input
                    type="text"
                    class="form-control dt-id_card"
                    id="basic-icon-default-id_card"
                    placeholder="Rapat"
                    value="{{$data->nip}}"
                    name="nip"
                    
                  />
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-name">Nama</label>
                  <input
                    type="text"
                    id="basic-icon-default-name"
                    class="form-control dt-name"
                    placeholder="12/02/2022"
                    value="{{auth()->user()->name}}"
                    
                    name="name"
                  />
                </div>
                <div class="mb-1">
                  <label for="register-cv" class="form-label">Surat pengunduran pdf</label>
                  <input type="file" class="register form-control @error('cv') is-invalid @enderror" id="register-cv"
                    name="cv" placeholder="xxx" aria-describedby="register-cv" tabindex="2"
                    value="{{ old('cv') }}" />
                  @error('cv')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary me-1 data-submit">Ajukan</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
              </form>
            </div>
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
