
@extends('layouts/contentLayoutMaster')

@section('title', 'Pelanggaran Karyawan')

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
        @if(auth()->user()->role=='admin')
        <button id="btn-add" class="dt-button add-new btn btn-danger mb-2"  
        aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#backdrop"><span>Tambah Pelanggaran</span></button>
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
                    <p class="h4 card-text text-white">Riwayat Pelanggaran</p>
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
                    <th>Nama</th>
                    <th>Nip</th>
                    <th>Jenis</th>
                    <th>Keterangan</th>
                    @if(auth()->user()->role=='admin')<th>Aksi</th>@endif
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
              <h4 class="modal-title" id="myModalLabel4">Tambah Pelanggaran</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="add-new-user pt-0" method="POST" action="{{route('pelanggaran-add-admin')}}">
                @csrf
                <input type="hidden" name="id" value="" id="id_pelanggaran"/>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-users_id">Karyawan</label>
                  <select
                    class="form-control select2 form-select"
                    id="basic-icon-default-id_card"
                    name="id_users">
                    @foreach ($kars as $kar)
                    <?php $gab=$kar->id.'&&'.$kar->nip.'&&'.$kar->name;?>
                    <option @if (old('id_users')==$gab) selected @endif value="{{$gab}}">{{$kar->name.' - '.$kar->nip}}</option>
                    @endforeach
                  </select>
                  @error('id_users')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-tanggal">Tanggal Pelanggaran</label>
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
                  <label class="form-label" for="basic-icon-default-in">Jenis Pelanggaran</label>
                  <input
                    type="text"
                    id="basic-icon-default-in"
                    class="form-control dt-in"
                    placeholder="Jenis"
                    name="jenis"
                    value="{{old('jenis')}}"
                  />
                  @error('jenis')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                <div class="mb-1">
                  <label class="form-label" for="basic-icon-default-out">Keterangan</label>
                  <input
                    type="text"
                    id="basic-icon-default-out"
                    class="form-control dt-out"
                    placeholder="Keterangan"
                    name="keterangan"
                    value="{{old('keterangan')}}"
                    />
                    @error('keterangan')
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
        ajax: "{{route('pelanggaran-data-admin')}}",
        columns: [
          { data: '' },
          { data: 'tanggal' },
          { data: 'nama' },
          { data: 'nip' },
          { data: 'jenis' },
          { data: 'keterangan' },
          @if(auth()->user()->role=='admin'){ data: 'aksi' }@endif
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
              return '<div class="text-center"><a class="a_edit btn btn-primary" pdf="'+full.id+'">Ubah</a> <a class="a_delete btn btn-danger" pdf="'+full.id_users+'" href="//{{request()->getHttpHost()}}/admin/pelanggaran_delete/'+full.id+'">Hapus</a></div>';
            }
          }@endif
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
  $('.dt-anggota').on('click', '.a_edit', function () {
        //dt_anggota.row($(this).parents('tr')).remove().draw();
        var dat = $(this).attr('pdf');
        var url = "//{{request()->getHttpHost()}}/admin/pelanggaran_data_single/"+dat;
        $.ajax({
          type: "GET",
          url: url,
          success: function(data){
              //if request if made successfully then the response represent the data
              console.log(data);
            var id_users=data.data.id_users+'&&'+data.data.nip+'&&'+data.data.nama;
            $("#basic-icon-default-id_card").val(id_users).change();
            $("#basic-icon-default-out").val(data.data.keterangan).change();
            $("#basic-icon-default-in").val(data.data.jenis).change();
            $("#id_pelanggaran").val(data.data.id).change();
            $("#basic-icon-default-tanggal").val(data.data.tanggal).change();
            $("#btn-add").click();
          }
        });
    });

</script>

@endsection
