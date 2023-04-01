
@extends('layouts/contentLayoutMaster')

@section('title', 'Pengunduran Diri Anggota SPSI')

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
        <button id="btn-add" class="dt-button add-new btn btn-primary mb-2"  aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Buat Pengunduran</span></button>
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
                    <p class="h4 card-text">Riwayat Pengunduran Diri</p>
                </div>
            </div>
          </div>
          <div class="card-body" >
            <div class="card-datatable table-responsive pt-3">
              <table class="dt-anggota table">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Divisi</th>
                    <th>Nama</th>
                    <th>ID Card</th>
                    <th>Email</th>
                    <th>Alasan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal to add new user starts-->
      <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
        <div class="modal-dialog">
          <form class="add-new-user modal-content pt-0" method="POST" action="{{route('pengunduran-add-user')}}">
            @csrf
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
            </div>
            <div class="modal-body flex-grow-1">
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-id_card">ID Card</label>
                <input
                  type="text"
                  class="form-control dt-id_card"
                  id="basic-icon-default-id_card"
                  placeholder="Rapat"
                  value="{{auth()->user()->card}}"
                  name="id_card"
                  
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
                <label class="form-label" for="basic-icon-default-email">Email</label>
                <input
                  type="text"
                  id="basic-icon-default-email"
                  class="form-control dt-email"
                  placeholder="12/02/2022"
                  value="{{auth()->user()->email}}"
                  
                  name="email"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-tanggal">Tanggal</label>
                <input
                  type="date"
                  id="basic-icon-default-tanggal"
                  class="form-control dt-tanggal"
                  placeholder="12/02/2022"
                  name="tanggal"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-alasan">Alasan</label>
                <textarea
                  type="text"
                  id="basic-icon-default-alasan"
                  class="form-control dt-alasan"
                  placeholder="Isi Informasi"
                  name="alasan"></textarea>
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
      var dt_ang = dt_anggota.DataTable({
        ajax: "{{route('pengunduran-data-user')}}",
        columns: [
          { data: '' },
          { data: 'divisi' },
          { data: 'nama' },
          { data: 'id_card' },
          { data: 'email' },
          { data: 'alasan' },
          { data: 'tanggal' },
          { data: '' },
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
            title: 'Status',
            orderable: true,
            render: function (data, type, full, meta) {
              var $status_number = full['status'];
              var $status = {
                "pengajuan": { title: 'Pengajuan', class: 'badge-light-primary' },
                "Setujui": { title: 'Disetujui', class: ' badge-light-success' },
                "Tolak": { title: 'Ditolak', class: ' badge-light-danger' },
              };
              if (typeof $status[$status_number] === 'undefined') {
                return data;
              }
              return (
                '<span class="badge rounded-pill ' +
                $status[$status_number].class +
                '">' +
                $status[$status_number].title +
                '</span>'
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
