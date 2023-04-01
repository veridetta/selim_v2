
@extends('layouts/contentLayoutMaster')

@section('title', 'Gaji Karyawan')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
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
                    <p class="h4 card-text text-white">Gaji Karyawan</p>
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
                    <th>Nama Karyawan</th>
                    <th>Bagian</th>
                    <th>Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunj. Tetap</th>
                    <th>Tunj. Jabatan</th>
                    <th>Tunj. Insentif</th>
                    <th>Tunj. Transport</th>
                    <th>Gaji Lembur</th>
                    <th>Periode</th>
                    <th>Gaji Bersih</th>
                    <th>Gaji Bersih</th>
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
      <!-- Modal -->
      <div
      class="modal modal-danger fade text-start"
      id="backdrop"
      tabindex="-1"
      aria-labelledby="myModalLabel4"
      data-bs-backdrop="false"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel4">Disabled Backdrop</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center" id="modal_lampiran">
            
          </div>
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
        ajax: "{{route('gaji-data-admin',['id_users'=>'kosong','bulan'=>'kosong','tahun'=>'kosong','download'=>'kosong'])}}",
        columns: [
          { data: '' },
          { data: 'id_karyawan' },
          { data: 'nama' },
          { data: 'j_bagian' },
          { data: 'j_jabatan' },
          { data: 'gaji_pokok' },
          { data: 'ttetap' },
          { data: 'tjabatan' },
          { data: 'tinsentif' },
          { data: 'ttransport' },
          { data: 'lembur' },
          { data: 'periode' },
          { data: 'gaji_bersih' },
          { data: 'gaji_bersih' },
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
          },{
            //number
            targets: -1,
            title: 'Aksi',
            orderable: false,
            render: function (data, type, full, meta) {
              return '<div class="text-center"><a class="a_view btn btn-primary" target="_blank" href="//{{request()->getHttpHost()}}/admin/gaji_data/'+full.id_users+'/'+full.bulan+'/'+full.tahun+'/view">Slip</a> <a class="a_download btn btn-danger" target="_blank"  href="//{{request()->getHttpHost()}}/admin/gaji_data/'+full.id_users+'/'+full.bulan+'/'+full.tahun+'/download">Unduh</a></div>';
            }
          }
        ]
        @if(Auth::user()->role=='pimpinan'),
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
});
</script>

@endsection
