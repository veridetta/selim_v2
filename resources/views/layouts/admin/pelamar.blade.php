
@extends('layouts/contentLayoutMaster')

@section('title', 'Data Pelamar')

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
                    <p class="h4 card-text text-white">Data Pelamar</p>
                </div>
            </div>
          </div>
          <div class="card-body" >
            <div class="card-datatable table-responsive pt-3">
              <table class="dt-anggota table">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Posisi</th>
                    <th>Foto</th>
                    <th>CV</th>
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
        ajax: "{{route('pelamar-data-admin')}}",
        columns: [
          { data: '' },
          { data: 'nama' },
          { data: 'nip' },
          { data: 'tpl' },
          { data: 'tgl' },
          { data: 'jk' },
          { data: 'telp' },
          { data: 'email' },
          { data: 'alamat' },
          { data: 'posisi' },
          { data: 'foto' },
          { data: 'cv' }
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
          },
            {
            //number
            targets: -1,
            title: 'CV',
            align: 'center',
            orderable: false,
            render: function (data, type, full, meta) {
              return '<a class="btn_pdf p-1 align-items-center" pdf="'+full.cv+'"><img class="me-1" src="http://spsi.test/images/icons/pdf.png" alt="data.json" height="35"></a>';
            }
          },
          {
            //number
            targets: -2,
            title: 'Foto',
            align: 'center',
            orderable: false,
            render: function (data, type, full, meta) {
              return '<a class="btn_jpg p-1 align-items-center" pdf="'+full.foto+'"><img class="me-1" src="http://spsi.test/images/icons/jpg.png" alt="data.json" height="35"></a>';
            }
          }
        ],
        dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
  // Delete Record
  $('.dt-anggota').on('click', '.btn_pdf', function () {
        //dt_anggota.row($(this).parents('tr')).remove().draw();
        var image = $(this).attr('pdf');
        var locat = "{{ asset('/storage/files/') }}"+"/"+image;
        $("#modal_lampiran").html('<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item col-12" height="400" id="pdf_src" src="" allowfullscreen></iframe></div>')
      $("#myModalLabel4").html('Lihat lampiran CV');
      $('#img_button').trigger('click');
      $("#pdf_src").attr("src",locat);
    });
    $('.dt-anggota').on('click', '.btn_jpg', function () {
        //dt_anggota.row($(this).parents('tr')).remove().draw();
        var image = $(this).attr('pdf');
        var locat = "{{ asset('/storage/images/') }}"+"/"+image;
        $("#modal_lampiran").html('<img class="img-fluid rounded mt-3 mb-2" src="" id="img_src" height="250" width="250" alt="User avatar">')
      $("#myModalLabel4").html('Lihat lampiran CV');
      $('#img_button').trigger('click');
      $("#img_src").attr("src",locat);
    });
});
</script>

@endsection
