
@extends('layouts/contentLayoutMaster')

@section('title', 'Profil Karyawan')

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
                    <div class="avatar bg-white text-danger p-50 m-0">
                        <div class="avatar-content">
                          <i data-feather="file" class="font-medium-5"></i>
                        </div>
                      </div>
                </div>
                <div class="col-lg-11 col-10 my-auto">
                    <div class=" d-flex justify-content-between flex-warp">
                      <div class="my-auto">
                        <p class="h4 card-text text-white">Profil Saya</p>
                      </div>
                      <div>
                        <a href="#" onclick="ubah()" id="btn_ubah" class="btn btn-light"> Ubah Data</a>
                      </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="card-body" >
            @if ($data==NULL)
            <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
              <div class="alert-body">
                  <strong>Anda belum melengkapi profil</strong>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form class="auth-register-form mt-2" enctype="multipart/form-data" method="POST" action="{{ route('profil-add-karyawan') }}">
              @csrf
              <div class="col-12 my-2 row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                  <input type="hidden" name="id_users" value="{{auth()->user()->id}}"/>
                  <div class="mb-1">
                    <label for="register-id_karyawan" class="form-id_karyawan">ID Karyawan</label>
                    <input type="text" class=" form-control @error('nip') is-invalid @enderror" id="register-id_karyawan" name="id_karyawan" placeholder="3224422xxx" required aria-describedby="register-id_karyawan" tabindex="1" autofocus value="{{ auth()->user()->id_karyawan ?? '' }}" disabled/>
                    @error('id_karyawan')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
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
              <button type="submit" class="register btn btn-danger w-100" tabindex="5">Simpan Data</button>
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
  var inp = $(".register");
  inp.prop('disabled',true);
  var cek = false;
  function ubah(){
    if(cek){
      inp.prop('disabled',true);
      $("#btn_ubah").html('Ubah Ubah');
      cek= false;
    }else{
      inp.prop('disabled',false);
      $("#btn_ubah").html('Batal Data');
      cek = true;
    }
  }
</script>

@endsection
