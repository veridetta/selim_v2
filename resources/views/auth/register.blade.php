@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
  <div class="auth-wrapper auth-basic px-2 bg-danger bg-darken-3">
    <div class="col-6 row my-2">
      <!-- Register Basic -->
      <div class="card mb-0">
        <div class="card-body">
          <div class="brand-logo">
            <div class="avatar bg-white">
              <img
                src="{{asset('images/logo/logo.png')}}"
                alt="avatar"
                width="60"
                height="60"
              />
            </div>
          </div>
          <a href="#" class="brand-logo">
            <h2 class="brand-text text-danger text-center ms-1">SISTEM INFORMASI PT. SELIM ELEKTRO</h2>
          </a>
          <form class="auth-register-form mt-2" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="col-12 my-2 justify-content-center">
              <input type="hidden" name="role" value="karyawan"/>
                <div class="mb-1">
                  <label for="register-id_karyawan" class="form-label">ID Karyawan</label>
                  <input type="text" class="form-control @error('id_karyawan') is-invalid @enderror" id="register-id_karyawan" name="id_karyawan" placeholder="32xxxx" aria-describedby="register-id_karyawan" tabindex="1" autofocus value="{{ old('id_karyawan') }}" />
                  @error('id_karyawan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-1">
                  <label for="register-name" class="form-label">Nama Karyawan</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="register-name"
                    name="name" placeholder="Abdul" aria-describedby="register-name" tabindex="2"
                    value="{{ old('name') }}" />
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="mb-1">
                  <label for="register-password" class="form-label">Password</label>
    
                  <div class="input-group input-group-merge form-password-toggle @error('password') is-invalid @enderror">
                    <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror"
                      id="register-password" name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="register-password" tabindex="3" />
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                  </div>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
    
                <div class="mb-1">
                  <label for="register-password-confirm" class="form-label">Confirm Password</label>
    
                  <div class="input-group input-group-merge form-password-toggle">
                    <input type="password" class="form-control form-control-merge" id="register-password-confirm"
                      name="password_confirmation"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="register-password" tabindex="3" />
                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                  </div>
                </div>
                <div class="mb-1">
                  <label for="register-role" class="form-label">Pilihan :</label>
    
                  <div class="input-group input-group-merge form-password-toggle">
                    <select name="status" id="status" class="select2 select form-select" value="{{ old('status') }}">
                      <option value="Karyawan Tetap">Karyawan Tetap</option>
                      <option value="Karyawan Kontrak">Karyawan Kontak</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger w-100" tabindex="5">Buat Akun</button>
          </form>

          <p class="text-center mt-2">
            <span class="text-black">Sudah mempunyai akun?</span>
            @if (Route::has('login'))
              <a href="{{ route('login') }}">
                <span>Masuk</span>
              </a>
            @endif
          </p>
      <!-- /Register basic -->
    </div>
  </div>
@endsection
