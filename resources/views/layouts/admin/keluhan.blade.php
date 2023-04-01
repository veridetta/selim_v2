
@extends('layouts/contentLayoutMaster')

@section('title', 'Keluhan Anggota SPSI')

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
                          <i data-feather="users" class="font-medium-5"></i>
                        </div>
                      </div>
                </div>
                <div class="col-lg-11 col-10 my-auto">
                    <p class="h4 card-text">Daftar Keluhan Anggota</p>
                </div>
            </div>
          </div>
          <div class="card-body" >
            <div class="card-datatable table-responsive pt-3">
              <table class="dt-anggota table">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Divisi</th>
                    <th>Nama</th>
                    <th>ID Card</th>
                    <th>Keluhan</th>
                    <th>Tanggapan</th>
                    <th>Status</th>
                  </tr>
                </thead>
              </table>
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

$(function () {
    'use strict';
  
    var dt_anggota = $('.dt-anggota');
  
    // Delete Record
    $('.dt-anggota tbody').on('click', '.item-delete', function () {
        dt_anggota.row($(this).parents('tr')).remove().draw();
    });
    // DATA ANGGOTA
    if (dt_anggota.length) {
      var udd= "{{route('keluhan-update-admin')}}";
      var dt_ang = dt_anggota.DataTable({
        ajax: "{{route('keluhan-data-admin')}}",
        columns: [
          { data: '' },
          { data: 'tanggal' },
          { data: 'divisi' },
          { data: 'nama' },
          { data: 'id_card' },
          { data: 'isi' },
          { data: 'tanggapan' },
          { data: '' }
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
            // Actions
            targets: -1,
            title: 'Actions',
            orderable: false,
            render: function (data, type, full, meta) {
              return (
                '<form method="POST" action="'+udd+'" class="text-center">@csrf<input type="hidden" name="up_id" value="'+full.id+'"/><textarea name="tanggapan" class="form-control form-sm"></textarea><input type="submit" class="btn-sm mt-1 btn btn-primary" value="Kirim"/></form>'
              );
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
  

</script>

@endsection
