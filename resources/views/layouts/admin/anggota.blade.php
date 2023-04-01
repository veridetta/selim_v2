
@extends('layouts/contentLayoutMaster')

@section('title', 'Daftar Anggota SPSI')

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
        <button id="btn-add" class="d-none dt-button add-new btn btn-primary mb-2"  aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Tambah Anggota</span></button>
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
                    <p class="h4 card-text">Daftar Anggota</p>
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
                    <th>Tanggal Masuk</th>
                    <th>Email</th>
                    <th>Alamat</th>
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
          <form class="add-new-user modal-content pt-0" method="POST" action="{{route('anggota-update-admin')}}">
            @csrf
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
              <h5 class="modal-title" id="exampleModalLabel">Ubah Anggota</h5>
            </div>
            <div class="modal-body flex-grow-1">
              <input
                  type="hidden"
                  class="form-control dt-divisi"
                  id="basic-icon-default-id"
                  placeholder="Rapat"
                  name="id"
                />
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-divisi">Divisi</label>
                <input
                  type="text"
                  class="form-control dt-divisi"
                  id="basic-icon-default-divisi"
                  placeholder="Rapat"
                  name="info_divisi"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-name">Nama</label>
                <input
                  type="text"
                  id="basic-icon-default-name"
                  class="form-control dt-name"
                  placeholder="Isi Informasi"
                  name="info_name"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-card">Id Card</label>
                <input
                  type="text"
                  id="basic-icon-default-card"
                  class="form-control dt-card"
                  placeholder="2022/12/02"
                  name="info_card"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-email">Email</label>
                <input
                  type="text"
                  id="basic-icon-default-email"
                  class="form-control dt-email"
                  placeholder="2022/12/02"
                  name="info_email"
                />
              </div>
              <div class="mb-1">
                <label class="form-label" for="basic-icon-default-masuk">Tanggal Masuk</label>
                <input
                  type="date"
                  id="basic-icon-default-masuk"
                  class="form-control dt-masuk"
                  placeholder="2022/12/02"
                  name="info_masuk"
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
function edit(id){
  var url = "{{route('anggota-first-admin')}}";
  var divisi = $("#basic-icon-default-divisi");
  var name = $("#basic-icon-default-name");
  var card = $("#basic-icon-default-card");
  var masuk = $("#basic-icon-default-masuk");
  var ids = $("#basic-icon-default-id");
  var email = $("#basic-icon-default-email");
  jQuery.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            type:"post",
            dataType:"json",
            async: false,
            url: url,
            data: {id: id},
            success: function(data) {
                ids.val(id);
                divisi.val(data.data.divisi);
                name.val(data.data.name);
                card.val(data.data.card);
                var date = data.data.date_change;
                masuk.val(date);
                email.val(data.data.email);
                $("#btn-add").trigger('click');
            },
        });
}
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
        ajax: "{{route('anggota-data-admin')}}",
        columns: [
          { data: '' },
          { data: 'divisi' },
          { data: 'name' },
          { data: 'card' },
          { data: 'masuk' },
          { data: 'email' },
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
                '<a href="#" class="item-edit" onclick="edit('+full.id+')">' +
                feather.icons['edit'].toSvg({ class: 'font-small-4 text-primary' }) +
                '</a>'+'<a href="/delete/'+full.id+'" class="item-delete"">' +
                feather.icons['trash'].toSvg({ class: 'font-small-4 text-danger' }) +
                '</a>'
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
