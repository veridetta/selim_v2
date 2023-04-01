
@extends('layouts/contentLayoutMaster')

@section('title', 'Pengajuan Izin Karyawan')

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
        @if ($data)
        <button id="btn-add" class="dt-button add-new btn btn-danger mb-2"  
        aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#backdrop"><span>Pengajuan Izin Absen</span></button>
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
                    <p class="h4 card-text text-white">Riwayat Izin Absen</p>
                </div>
            </div>
          </div>
          <div class="card-body" >
            @if ($data)
            <div class="card-datatable table-responsive pt-3">
              <table class="dt-anggota table">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>Id Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Tanggal Absen</th>
                    <th>Ket Absen</th>
                    <th>File</th>
                  </tr>
                </thead>
              </table>
            </div>
            @else
            <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
              <div class="alert-body">
                  <strong>Anda belum melengkapi profil</strong><span>Silahkan lengkapi terlebih dahulu</span>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
          </div>
        </div>
      </div>
      <!-- Modal to add new user starts-->
      <div class="modal modal-danger fade text-start" id="backdrop" tabindex="-1" aria-labelledby="myModalLabel4"data-bs-backdrop="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel4">Pengajuan Izin</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="add-new-user pt-0" method="POST" enctype="multipart/form-data"  action="{{route('cuti-add-karyawan')}}">
                @csrf
                <input type="hidden" name="id_users" value="{{auth()->user()->id}}"/>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-id_karyawan">ID Karyawan</label>
                  <input
                    type="text"
                    class="form-control dt-id_card"
                    id="basic-icon-default-id_card"
                    placeholder="Rapat"
                    value="{{$data->id_karyawan}}"
                    name="id_karyawan" disabled
                  />
                </div>
                
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-name">Nama Karyawan</label>
                  <input
                    type="text"
                    id="basic-icon-default-name"
                    class="form-control dt-name"
                    placeholder="12/02/2022"
                    value="{{auth()->user()->name}}"
                    disabled
                    name="name"
                  />
                </div>
                <input
                    type="hidden"
                    class="form-control dt-id_card"
                    id="basic-icon-default-id_card"
                    placeholder="Rapat"
                    value="{{$data->jabatan}}"
                    name="jabatan"
                    
                  />
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-jabatan">Jabatan</label>
                  <input
                    type="text"
                    class="form-control dt-id_card"
                    id="basic-icon-default-id_card"
                    placeholder="Rapat"
                    value="{{$data->jabatan_jabatan}}"
                    name="jabatanx" disabled
                    
                  />
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-tanggal">Tanggal Absen</label>
                  <input
                    type="date"
                    id="basic-icon-default-tanggal"
                    class="form-control dt-tanggal"
                    placeholder="12/02/2022"
                    name="tanggal"
                  />
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-ket">Ket Absen</label>
                  <select
                    type="date"
                    id="basic-icon-default-ket"
                    class="form-control dt-ket"
                    name="ket">
                    <option>Sakit</option>
                    <option>Izin</option>
                  </select>
                </div>
                <div class="mb-1">
                  <label for="register-foto" class="form-label">Lampiran</label>
                  <input type="file" class="register form-control @error('foto') is-invalid @enderror" id="register-foto"
                    name="foto" placeholder="xxx" aria-describedby="register-foto" tabindex="2"
                    value="{{ old('foto') }}" />
                  @error('foto')
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
      </div>
      <button type="button" class="d-none btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#backdropz" id="img_buttonx">
        Disabled Backdrop
      </button>
      <!-- Modal -->
      <div class="modal modal-danger fade text-start" id="backdropz"
      tabindex="-1" aria-labelledby="myModalLabel5" data-bs-backdrop="true" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel5">Disabled Backdrop</h4>
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
  
    // Delete Record
    $('.dt-anggota tbody').on('click', '.item-delete', function () {
        dt_anggota.row($(this).parents('tr')).remove().draw();
    });
    // DATA ANGGOTA
    if (dt_anggota.length) {
      var dt_ang = dt_anggota.DataTable({
        ajax: "{{route('cuti-data-karyawan')}}",
        columns: [
          { data: '' },
          { data: 'id_karyawan' },
          { data: 'nama' },
          { data: 'jabatan_jabatan' },
          { data: 'tanggal' },
          { data: 'ket' },
          { data: 'foto' }
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
  $('.dt-anggota').on('click', '.btn_jpg', function () {
        //dt_anggota.row($(this).parents('tr')).remove().draw();
        var image = $(this).attr('pdf');
        var locat = "{{ asset('/storage/images/') }}"+"/"+image;
        $("#modal_lampiran").html('<img class="img-fluid rounded mt-3 mb-2" src="" id="img_src" height="250" width="250" alt="User avatar">')
      $("#myModalLabel5").html('Lihat lampiran Foto');
      $('#img_buttonx').trigger('click');
      $("#img_src").attr("src",locat);
    });
});
    </script>

@endsection
