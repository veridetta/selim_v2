
@extends('layouts/contentLayoutMaster')

@section('title', 'Data Diri Pelamar')

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
                        <p class="h4 card-text text-white">Data Lamaran Saya</p>
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
                  <strong>Anda belum membuat lamaran</strong>
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form class="auth-register-form mt-2" enctype="multipart/form-data" method="POST" action="{{ route('data-add-pelamar') }}">
              @csrf
              <div class="col-12 my-2 row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                  <input type="hidden" name="id_users" value="{{auth()->user()->id}}"/>
                  <div class="mb-1">
                    <label for="register-nip" class="form-nip">NIP</label>
                    <input type="text" class="register form-control @error('nip') is-invalid @enderror" id="register-nip" name="nip" placeholder="3224422xxx" aria-describedby="register-nip" tabindex="1" autofocus value="{{ $data->nip ?? '' }}" />
                    @error('nip')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-1">
                    <label for="register-name" class="form-label">Nama</label>
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
                    <label for="register-alamat" class="form-label">Alamat</label>
                    <textarea type="text" class="register form-control @error('alamat') is-invalid @enderror" id="register-alamat"
                      name="alamat" placeholder="Jl Merbabu xxxx" aria-describedby="register-alamat" tabindex="2"
                      value="">{{ $data->alamat ?? '' }}</textarea>
                    @error('alamat')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-1">
                    <label for="register-telp" class="form-label">Nomor Telepon</label>
                    <input type="number" class="register form-control @error('telp') is-invalid @enderror" id="register-telp"
                      name="telp" placeholder="082xxx" aria-describedby="register-telp" tabindex="2"
                      value="{{ $data->telp ?? '' }}" />
                    @error('telp')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-1">
                    <label for="register-email" class="form-label">Email</label>
                    <input type="text" class="register form-control @error('email') is-invalid @enderror" id="register-email"
                      name="email" placeholder="xxxx@gmail.com" aria-describedby="register-email" tabindex="2"
                      value="{{ $data->nip ?? '' }}" />
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="row col-12 justify-content-center text-center">
                    <div class="col-3">
                      <img class="img-fluid rounded mt-3 mb-2" src="{{  $data ? asset('storage/images/'.$data->foto) : Auth::user()->profile_photo_url }}" height="110" width="110" alt="User avatar">
                    </div>
                    <a class=" p-1 align-items-center" onclick="@if($data)viewImage('{{$data->cv}}')@endif">
                      <img class="me-1" src="http://spsi.test/images/icons/pdf.png" alt="data.json" height="18">
                      <span class="mb-0 h6 badge {{$data ? 'badge-light-primary badge-glow':'badge-light-secondary'}} ">{{$data ? 'Buka lampiran CV' : 'Belum ada lampiran CV'}}</span>
                    </a>
                  </div>
                  <div class="mb-1">
                    <label for="register-foto" class="form-label">Pas Foto</label>
                    <input type="file" class="register form-control @error('foto') is-invalid @enderror" id="register-foto"
                      name="foto" aria-describedby="register-foto" tabindex="2"
                      value="{{ old('foto') }}" />
                    @error('foto')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-1">
                    <label for="register-cv" class="form-label">CV</label>
                    <input type="file" class="register form-control @error('cv') is-invalid @enderror" id="register-cv"
                      name="cv" placeholder="xxx" aria-describedby="register-cv" tabindex="2"
                      value="{{ old('cv') }}" />
                    @error('cv')
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
          <div class="modal-body text-center">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item col-12" height="400" id="pdf_src" src="" allowfullscreen></iframe>
            </div>
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
  function viewImage(image){
      var locat = "{{ asset('/storage/files/') }}"+"/"+image;
      $("#myModalLabel4").html('Lihat lampiran CV');
      $('#img_button').trigger('click');
      $("#pdf_src").attr("src",locat);
    }
</script>

@endsection
