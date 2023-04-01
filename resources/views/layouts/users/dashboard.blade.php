
@extends('layouts/contentLayoutMaster')

@section('title', 'Beranda')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/base/pages/page-pricing.css')}}">
  <style>
    .f-60{
        width: 60px;
        height: 60px;
    }
  </style>
@endsection

@section('content')
<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  @include('panels.flash')
      <!-- Greetings Card starts -->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-profile">
          <img src="{{asset('images/logo/bg.jpg')}}" class="img-fluid card-img-top" alt="Profile Cover Photo">
          <div class="card-body text-center">
            <div class="profile-image-wrapper" bis_skin_checked="1">
              <div class="profile-image" bis_skin_checked="1">
                <div class="avatar bg-white" bis_skin_checked="1">
                  <img src="{{asset('images/logo/logo.png')}}" alt="Profile Picture">
                </div>
              </div>
            </div>
            <h3>PT SELIM ELEKTRO</h3>
              <h6 class="text-muted">Losari Brebes - Jawa Tengah</h6>
              <hr class="mb-2">
              <div class="d-flex justify-content-between align-items-center" bis_skin_checked="1">
                <div>
                  <h6 class="text-danger text-start fw-bolder">Tentang Perusahaan</h6>
                  <p class="text-start">PT. Selim Elektro merupakan perusahaan yang bergerak dalam bidang perakian sparepart Wire Harness untuk Samsung Elektronik tujuan eksport Korea.</p>
                </div>
              </div>
          </div>
          <div class="card-footer">
            <div class="d-flex flex-row meetings" bis_skin_checked="1">
              <div class="avatar bg-light-danger rounded me-1" bis_skin_checked="1">
                <div class="avatar-content" bis_skin_checked="1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin avatar-icon font-medium-3"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
              </div>
              <div class="content-body text-start" bis_skin_checked="1">
                <h6 class="mb-0">PT. Selim Elektro</h6>
                <small>Desa Kecipir RT. 002 Rw. 002 Kec. Losari Kab Brebes - Jawa Tengah</small>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if(auth()->user()->role == 'pelamar')
      <div class="text-center" bis_skin_checked="1">
        <h1 class="mt-5">Lowongan Pekerjaan Tersedia</h1>
        <p class="mb-2 pb-75">
          Berikut ini beberapa lowongan pekerjaan yang masih tersedia .
        </p>
      </div>
      <div class="row pricing-card" bis_skin_checked="1">
        <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto" bis_skin_checked="1">
          <div class="row match-height" bis_skin_checked="1">
            <!-- basic plan -->
            <div class="col-12 col-md-4" bis_skin_checked="1">
              <div class="card basic-pricing text-center" bis_skin_checked="1">
                <div class="card-body" bis_skin_checked="1">
                  <i class=" text-danger f-60" data-feather="users" size="33" ></i>
                  <h3 class="pt-3">Operator Produksi 1</h3>
                  @if ($data)
                    @if ($data?$data->posisi=='belum':dd($data))
                    <a class="btn w-100 btn-outline-danger mt-2 waves-effect" href="{{ route('posisi-add-pelamar', ['id'=>$data->id, 'posisi'=>'Operator Produksi 1']) }}"  >Lamar Posisi Ini</a>
                    @elseif ($data->posisi=='Operator Produksi 1')
                      <button class="btn w-100 btn-outline-success mt-2 waves-effect"  disabled>Anda melamar posisi ini</button>
                    @else
                    <button class="btn w-100 btn-outline-secondary mt-2 waves-effect"  disabled>Anda sudah membuat lamaran</button>
                    @endif
                  @else
                  <button class="btn w-100 btn-outline-danger mt-2 waves-effect"  disabled="{{$data ? 'false': 'true'}}">{{$data ? 'Lamar Posisi Ini' : 'Silahkan lengkapi CV terlebih dahulu'}}</button>
                  @endif
                </div>
              </div>
            </div>
            <!--/ basic plan -->
            <!-- standard plan -->
            <div class="col-12 col-md-4" bis_skin_checked="1">
              <div class="card standard-pricing  border-danger text-center" bis_skin_checked="1">
                <div class="card-body" bis_skin_checked="1">
                  <div class="pricing-badge text-end" bis_skin_checked="1">
                    <span class="badge rounded-pill badge-light-danger">Popular</span>
                  </div>
                  <i class=" text-danger f-60" data-feather="user-plus" size="33" ></i>
                  <h3 class="pt-2">Operator Produksi 2</h3>
                  @if ($data)
                    @if ($data?$data->posisi=='belum':dd($data))
                    <a class="btn w-100 btn-outline-danger mt-2 waves-effect" href="{{ route('posisi-add-pelamar', ['id'=>$data->id, 'posisi'=>'Operator Produksi 2']) }}"  >Lamar Posisi Ini</a>
                    @elseif ($data->posisi=='Operator Produksi 2')
                      <button class="btn w-100 btn-outline-success mt-2 waves-effect"  disabled>Anda melamar posisi ini</button>
                    @else
                    <button class="btn w-100 btn-outline-secondary mt-2 waves-effect"  disabled>Anda sudah membuat lamaran</button>
                    @endif
                  @else
                  <button class="btn w-100 btn-outline-danger mt-2 waves-effect"  disabled="{{$data ? 'false': 'true'}}">{{$data ? 'Lamar Posisi Ini' : 'Silahkan lengkapi CV terlebih dahulu'}}</button>
                  @endif
                </div>
              </div>
            </div>
            <!--/ standard plan -->
            <div class="col-12 col-md-4" bis_skin_checked="1">
              <div class="card standard-pricing text-center" bis_skin_checked="1">
                <div class="card-body" bis_skin_checked="1">
                  <i class=" text-danger f-60" data-feather="settings" size="33" ></i>
                  <h3 class="pt-3">Quality Control</h3>
                  @if ($data)
                    @if ($data?$data->posisi=='belum':dd($data))
                    <a class="btn w-100 btn-outline-danger mt-2 waves-effect" href="{{ route('posisi-add-pelamar', ['id'=>$data->id, 'posisi'=>'Quality Control']) }}"  >Lamar Posisi Ini</a>
                    @elseif ($data->posisi=='Quality Control')
                      <button class="btn w-100 btn-outline-success mt-2 waves-effect"  disabled>Anda melamar posisi ini</button>
                    @else
                    <button class="btn w-100 btn-outline-secondary mt-2 waves-effect"  disabled>Anda sudah membuat lamaran</button>
                    @endif
                  @else
                  <button class="btn w-100 btn-outline-danger mt-2 waves-effect"  disabled="{{$data ? 'false': 'true'}}">{{$data ? 'Lamar Posisi Ini' : 'Silahkan lengkapi CV terlebih dahulu'}}</button>
                  @endif
                </div>
              </div>
            </div>
            <!--/ enterprise plan -->
            <div class="col-12 card border-3 border-bottom-danger">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <p class="h4">Persyaratan :</p>
                    <ul class="list-group list-group-flush text-start">
                      <?php $nam=array("Usia minimal 18 tahun, Maksimal 25 Tahun","Pendidikan SMA / SMK / Sederajat","Bersedia Kerja Shift","Tidak Buta Warna","Tidak Sedang Hamil","Surat Lamaran Lengkap","Melampirkan Sertifikat Vaksin");?>
                      @foreach ($nam as $nem)
                      <li class="list-group-item pb-0 mb-0">
                        <input class="form-check-input me-1 border-danger bg-danger" type="checkbox" value="" aria-label="..." checked disabled>{{$nem}}
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="col-6">
                    <p class="h4">Benefit :</p>
                    <ul class="list-group list-group-flush text-start">
                      <?php $ben=array("Gaji UMR Brebes (Berlaku Skala Upah)","BPJS","Makan Siang","Tunjangan Transport","Tunjangan Shift","Tunjangan Premi Hadir","Kompensasi PKWT");?>
                      @foreach ($ben as $ban)
                      <li class="list-group-item pb-0 mb-0">
                        <input class="form-check-input me-1 border-danger bg-danger" type="checkbox" value="" aria-label="..." checked disabled>{{$ban}}
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
</section>
<!-- Dashboard Analytics end -->
@endsection

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->

@endsection
