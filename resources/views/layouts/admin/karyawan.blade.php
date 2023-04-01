
@extends('layouts/contentLayoutMaster')

@section('title', 'Data Karyawan')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
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
        <button id="btn-add" class="d-none dt-button add-new btn btn-danger mb-2"  
        aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#backdrop"><span>Tambah Karyawan</span></button>
        <div class="card">
          <div class="card-header bg-danger flex-column align-items-start">
            <div class="row col-12">
                <div class="col-lg-1 col-2">
                    <div class="avatar bg-light p-50 m-0">
                        <div class="avatar-content text-danger">
                          <i data-feather="users" class="font-medium-5"></i>
                        </div>
                      </div>
                </div>
                <div class="col-lg-11 col-10 my-auto">
                    <p class="h4 card-text text-white">Data Karyawan</p>
                </div>
            </div>
          </div>
          <div class="card-body" >
            <div class="card-datatable table-responsive pt-3">
              <table class="dt-anggota table">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>ID Karyawan</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Kota</th>
                    <th>Mulai Bekerja</th>
                    <th>Bagian</th>
                    <th>Email</th>
                    @if(Auth::user()->role=='admin')<th>Opsi</th>@endif
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <button type="button" class="d-none btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#backdrop" id="img_button">
        Disabled Backdrop
      </button>
      <!-- Modal to add new user starts-->
      <div
      class="modal modal-danger fade text-start"
      id="backdrop"
      tabindex="-1"
      aria-labelledby="myModalLabel4"
      data-bs-backdrop="false"
      aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel4">Tambah Karyawan</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="add-new-user pt-0" method="POST" action="{{route('karyawan-add-admin')}}">
                @csrf
                <input type="hidden" name="id" value="" id="id_data"/>
                <div class="col-12 my-2 row justify-content-center">
                  <div class="col-lg-12 col-md-12 col-12">
                    <input type="hidden" name="id_users" value=""/>
                    <div class="mb-1">
                      <label for="register-id_karyawan" class="form-id_karyawan">ID Karyawan</label>
                      <input type="text" class=" form-control @error('id_karyawan') is-invalid @enderror" id="register-id_karyawanx" name="id_karyawanx" placeholder="3224422xxx" required aria-describedby="register-id_karyawan" tabindex="1" autofocus value="{{ auth()->user()->id_karyawan ?? '' }}" disabled/>
                      @error('id_karyawan')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <input type="hidden" class=" form-control @error('id_karyawan') is-invalid @enderror" id="register-id_karyawan" name="id_karyawan" placeholder="3224422xxx" required aria-describedby="register-id_karyawan" tabindex="1" autofocus value="{{ auth()->user()->id_karyawan ?? '' }}"/>
                    <div class="mb-1">
                      <label for="register-name" class="form-label">Nama Karyawan</label>
                      <input type="text" class="register form-control @error('name') is-invalid @enderror" id="register-name"
                        name="name" placeholder="xxx" aria-describedby="register-name" tabindex="2"
                        value="{{ $data->nama ?? '' }}" />
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-1">
                      <label for="register-tpl" class="form-label">Tempat Lahir</label>
                      <input type="text" class="register form-control @error('tpl') is-invalid @enderror" id="register-tpl"
                        name="tpl" placeholder="xxx" aria-describedby="register-tpl" tabindex="2"
                        value="{{ $data->tpl ?? '' }}" />
                      @error('tpl')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-1">
                      <label for="register-tgl" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="register form-control @error('tgl') is-invalid @enderror" id="register-tgl"
                        name="tgl" placeholder="xxx" aria-describedby="register-tgl" tabindex="2"
                        value="{{ $data->tgl ?? '' }}" />
                      @error('tgl')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-1">
                      <label for="register-jk" class="form-label">Jenis Kelamin</label>
                      <select class="register form-control select2 select-form @error('jk') is-invalid @enderror" id="register-jk"
                        name="jk"  aria-describedby="register-jk" tabindex="2"
                        value="{{ $data->jk ?? '' }}" >
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                      @error('jk')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-1">
                      <label for="register-kota" class="form-label">Kota</label>
                      <input type="text" class="register form-control @error('kota') is-invalid @enderror" id="register-kota"
                        name="kota" placeholder="Cirebon" aria-describedby="register-kota" tabindex="2"
                        value="{{ $data->kota ?? '' }}">
                      @error('kota')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-1">
                      <label for="register-mulai" class="form-label">Mulai Bekeja</label>
                      <input type="date" class="register form-control @error('mulai') is-invalid @enderror" id="register-mulai"
                        name="mulai" placeholder="082xxx" aria-describedby="register-mulai" tabindex="2"
                        value="{{ $data->mulai ?? '' }}" />
                      @error('mulai')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-1">
                      <label for="register-jabatan" class="form-label">Jabatan</label>
                      <select class="register form-control select2 select-form @error('jk') is-invalid @enderror" id="register-jabatan"
                        name="jabatan"  aria-describedby="register-jabatan" tabindex="2"
                        value="{{ $data->jabatan ?? '' }}" >
                        @foreach ($jabatans as $jabatan)
                        <option value="{{$jabatan->id}}">{{$jabatan->kode.'-'.$jabatan->jabatan}}</option>
                        @endforeach
                      </select>
                      @error('jabatan')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-1">
                      <label for="register-email" class="form-label">Email</label>
                      <input type="text" class="register form-control @error('email') is-invalid @enderror" id="register-email"
                        name="email" placeholder="johan@gmail.com" aria-describedby="register-email" tabindex="2"
                        value="{{ $data->email ?? '' }}" />
                      @error('mulai')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary me-1 data-submit">Kirim</button>
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
  /**
* DataTables Basic
*/
$(document).ready( function () {
  $(function () {
    'use strict';
  
    var dt_anggota = $('.dt-anggota');
    // DATA ANGGOTA
    if (dt_anggota.length) {
      var dt_ang = dt_anggota.DataTable({
        ajax: "{{route('karyawan-data-admin')}}",
        columns: [
          { data: '' },
          { data: 'id_karyawan' },
          { data: 'nama' },
          { data: 'tpl' },
          { data: 'tgl' },
          { data: 'jk' },
          { data: 'kota' },
          { data: 'mulai' },
          { data: 'j_jabatan' },
          { data: 'email' },
          @if(Auth::user()->role=='admin'){ data: 'email' },@endif
        ],
        columnDefs: [
          {
            "defaultContent": "-",
            "targets": "_all"
          },
            {
            //number
            targets: 0,
            title: 'No',
            orderable: false,
            render: function (data, type, full, meta) {
              return meta.row + meta.settings._iDisplayStart + 1;
            }
          }@if(auth()->user()->role=='admin'),
          {
            //number
            targets: -1,
            title: 'Opsi',
            orderable: false,
            render: function (data, type, full, meta) {
              return '<div class="text-center"><a class="a_edit btn btn-primary" pdf="'+full.id+'">Ubah</a></div>';
            }
          }@endif
        ]@if(Auth::user()->role=='pimpinan'),
        dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [
        {
          extend: 'collection',
          className: 'btn btn-outline-secondary dropdown-toggle me-2',
          text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
          buttons: [
            {
              extend: 'print',
              text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] },
              customize: function (doc) {
                doc.defaultStyle.orientation = 'landscape';
              }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] },
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] },
              customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c', sheet).attr('s', '51');
              }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] },
              customize: function (doc) {
                doc.pageMargins = [40, 60, 40, 60]; // Set the margins
                doc.defaultStyle.fontSize = 10; // Set the font size
                doc.styles.tableHeader.fontSize = 10; // Set the font size for table headers
                doc.styles.title.fontSize = 12; // Set the font size for the title
                doc.pageSize = 'A4'; // Set the page size
                doc.pageOrientation = 'landscape'; // Set the page orientation
              }
            },
            {
              extend: 'copy',
              text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9] },
            },{
              orientation: 'landscape'
            }
          ],
          init: function (api, node, config) {
            $(node).removeClass('btn-secondary');
            $(node).parent().removeClass('btn-group');
            setTimeout(function () {
              $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
            }, 50);
          }
        }
      ],
      @else
      ,
        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      @endif
        displayLength: 7,
        lengthMenu: [7, 10, 25, 50, 75, 100],
        language: {
          paginate: {
            // remove previous & next text from pagination
            previous: '&nbsp;',
            next: '&nbsp;'
          }
        }
      });
    }
  });
  $('.dt-anggota').on('click', '.a_edit', function () {
        //dt_anggota.row($(this).parents('tr')).remove().draw();
        var dat = $(this).attr('pdf');
        var url = "//{{request()->getHttpHost()}}/admin/karyawan_data_single/"+dat;
        $.ajax({
          type: "GET",
          url: url,
          success: function(data){
              //if request if made successfully then the response represent the data
              console.log(data);
            $("#id_data").val(data.data.id).change();
            $("#register-id_karyawan").val(data.data.id_karyawan).change();
            $("#register-id_karyawanx").val(data.data.id_karyawan).change();
            $("#register-name").val(data.data.nama).change();
            $("#register-tpl").val(data.data.tpl).change();
            $("#register-tgl").val(data.data.tgl).change();
            $("#register-jk").val(data.data.jk).change();
            $("#register-kota").val(data.data.kota).change();
            $("#register-mulai").val(data.data.mulai).change();
            $("#register-jabatan").val(data.data.jabatan).change();
            $("#register-email").val(data.data.email).change();
            $("#btn-add").click();
          }
        });
    });
});
</script>

@endsection
