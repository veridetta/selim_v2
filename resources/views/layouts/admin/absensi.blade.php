
@extends('layouts/contentLayoutMaster')

@section('title', 'Absensi Karyawan')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
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
        @if(auth()->user()->role=='admin')
        <button id="btn-add" class="dt-button add-new btn btn-danger mb-2"  
        aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#backdrop"><span>Tambah Absensi</span></button>
        @endif
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
                    <p class="h4 card-text text-white">Riwayat Absensi</p>
                </div>
            </div>
          </div>
          <div class="card-body" >
            <div class="card-datatable table-responsive pt-3">
              <table class="dt-anggota table">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Id Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tanggal Absen</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Status</th>
                    @if(Auth::user()->role=='admin')<th>Opsi</th>@endif
                  </tr>
                </thead>
              </table>
            </div>
            
          </div>
        </div>
      </div>
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
              <h4 class="modal-title" id="myModalLabel4">Tambah Absensi</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="add-new-user pt-0" method="POST" action="{{route('absensi-add-admin')}}">
                @csrf
                <input type="hidden" name="id" value="" id="id_absen"/>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-users_id">Karyawan</label>
                  <select
                    class="form-control select2 form-select"
                    id="basic-icon-default-id_card"
                    name="id_users">
                    @foreach ($kars as $kar)
                    <?php $gab=$kar->id.'&&'.$kar->id_karyawan.'&&'.$kar->name;?>
                    <option @if (old('id_users')==$gab) selected @endif value="{{$gab}}">{{$kar->name.' - '.$kar->id_karyawan}}</option>
                    @endforeach
                  </select>
                  @error('id_users')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-jabatan">Jabatan</label>
                  <select
                    class="form-control dt-id_card"
                    id="basic-icon-default-jabatan"
                    placeholder="Rapat"
                    name="jabatan" >
                    @foreach ($data as $d)
                      <option value="{{$d->id}}">{{$d->bagian.' - '.$d->jabatan}}
                    @endforeach
                  </select>
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-tanggal">Tanggal Absen</label>
                  <input
                    type="date"
                    id="basic-icon-default-tanggal"
                    class="form-control dt-tanggal"
                    name="tanggal"
                    placeholder="12/02/2022"
                    value="{{old('tanggal')}}"
                  />
                  @error('tanggal')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-in">Jam Masuk</label>
                  <input
                    type="time"
                    id="basic-icon-default-in"
                    class="form-control dt-in"
                    placeholder="12/02/2022"
                    name="in"
                    value="{{old('in')}}"
                  />
                  @error('in')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-out">Jam Keluar</label>
                  <input
                    type="time"
                    id="basic-icon-default-out"
                    class="form-control dt-out"
                    placeholder="12/02/2022"
                    name="out"
                    value="{{old('out')}}"
                    />
                    @error('out')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-ket">Ket. Absensi</label>
                  <input
                    type="text"
                    id="basic-icon-default-out"
                    class="form-control dt-out"
                    placeholder="Ontime"
                    name="ket"
                    value="{{old('ket')}}"
                    />
                    @error('ket')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
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

$(function () {
    'use strict';
    var dt_anggota = $('.dt-anggota');
    // DATA ANGGOTA
    if (dt_anggota.length) {
      var dt_ang = dt_anggota.DataTable({
        ajax: "{{route('absensi-data-admin')}}",
        columns: [
          { data: '' },
          { data: 'id_karyawan' },
          { data: 'nama' },
          { data: 'jabatan_jabatan' },
          { data: 'tanggal' },
          { data: 'in' },
          { data: 'out' },
          { data: 'status' },
          @if(Auth::user()->role=='admin'){ data: 'status' }@endif
          
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
            title: 'Aksi',
            orderable: false,
            render: function (data, type, full, meta) {
              return '<div class="text-center"><a class="a_edit btn-sm btn btn-primary" pdf="'+full.id+'">Ubah</a> </div>';
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
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] },
              customize: function (doc) {
                doc.defaultStyle.orientation = 'landscape';
              }
            },
            {
              extend: 'csv',
              text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] }
            },
            {
              extend: 'excel',
              text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] },
              customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c', sheet).attr('s', '51');
              }
            },
            {
              extend: 'pdf',
              text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
              className: 'dropdown-item',
              exportOptions: { columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12] },
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
              exportOptions: { columns: [0, 1,2, 3, 4, 5,6,7,8,9,10,11,12] }
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
        var url = "//{{request()->getHttpHost()}}/admin/absensi_data_single/"+dat;
        $.ajax({
          type: "GET",
          url: url,
          success: function(data){
              //if request if made successfully then the response represent the data
              console.log(data);
              //alert(data.data.id_karyawan);
            var id_users=data.data.id_users+'&&'+data.data.id_karyawan+'&&'+data.data.nama;
            $("#basic-icon-default-users_id").val(id_users).change();
            $("#basic-icon-default-out").val(data.data.out).change();
            $("#basic-icon-default-id_card").val(id_users).change();
            $("#basic-icon-default-in").val(data.data.in).change();
            $("#id_absen").val(data.data.id).change();
            $("#basic-icon-default-ket").val(data.data.ket).change();
            $("#basic-icon-default-jabatan").val(data.data.jabatan).change();
            $("#basic-icon-default-tanggal").val(data.data.tanggal).change();
            $("#btn-add").click();
          }
        });
    });

</script>

@endsection
