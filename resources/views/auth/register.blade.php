@extends('layouts.appauth')

@section('content')
    <div class="content">
        <div class="left-side">
            <div class="login-box">
                <div class="d-flex flex-row mb-3">
                    <a href="/login" class="text-white">
                        <i class="bi bi-chevron-left me-3 fs-4"></i>
                    </a>
                    <span class="h2">Registrasi</span>
                </div>
                <form method="POST" action="{{ route('register') }}">

                    @csrf
                    <label for="name" class="form-label">Nama</label>
                    <div class=" mb-3">
                        <input id="name" type="text"
                            class="form-control border border-secondary shadow  @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Masukkan Nama">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="nik" class="form-label">NIK</label>
                    <div class=" mb-3">
                        <input id="nik" type="text"
                            class="form-control border border-secondary shadow  @error('nik') is-invalid @enderror"
                            name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus maxlength="16"
                            placeholder="Masukkuan NIK">

                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0" id="basic-addon2">
                            <i class="bi bi-envelope text-secondary"></i>
                        </span>
                        <input type="email" id="email" name="email"
                            class="form-control border-0 py-2 px-0 @error('email') is-invalid @enderror"
                            placeholder="Masukkan Email" value="{{ old('email') }}" aria-label="Masukkan Email"
                            aria-describedby="basic-addon2">
                        @error('email')
                            <span class="invalid-feedback text-danger"role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="password" class="form-label">Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0" id="basic-addon2">
                            <i class="bi bi-lock text-secondary"></i>
                        </span>
                        <input type="password" id="password" name="password"
                            class="form-control border-0 py-2 px-0 @error('password') is-invalid @enderror"
                            placeholder="Masukkan Password" aria-label="Masukkan Password" aria-describedby="basic-addon2">
                        <span class="input-group-text bg-white border-0" id="basic-addon2">
                            <i class="bi bi-eye-slash text-secondary" id="togglePassword" style="cursor: pointer"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0" id="basic-addon2">
                            <i class="bi bi-lock text-secondary"></i>
                        </span>
                        <input id="password-confirm" type="password" class="form-control border-0 py-2 px-0"
                            name="password_confirmation" required autocomplete="new-password"
                            aria-describedby="basic-addon2" placeholder="Konfirmasi Password">
                        <span class="input-group-text bg-white border-0" id="basic-addon2">
                            <i class="bi bi-eye-slash text-secondary" id="togglePassword2" style="cursor: pointer"></i>
                        </span>
                    </div>


                    {{-- BACKEND DATA BASE --}}
                    <div class="row mb-3 d-none">
                        <label for="level"
                            class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Level') }}</label>

                        <div class="col-md-6">
                            <input id="level" type="text" class="form-control" name="level" value="kader">
                        </div>
                    </div>
                    <div class="row mb-3 d-none">
                        <label for="status"
                            class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Status') }}</label>

                        <div class="col-md-6">
                            <input id="status" type="text" class="form-control" name="status" value="Belum Aktif">
                        </div>
                    </div>

                    {{-- Registrasi Sebagai Bidan --}}
                    <div class="form-check">
                        <input class="form-check-input border border-secondary shadow" type="checkbox"
                            name="cekLevel" id="cekLevel">
                        <label class="form-check-label" for="cekLevel">
                            Registrasi Sebagai bidan
                        </label>
                    </div>

                    {{-- Button Register --}}
                    <button type="submit" class="btn-login mt-3">
                        <i class="bi bi-plus-circle"></i> Registrasi
                    </button>
                </form>
                <p class="register-link">Sudah punya akun? <a href="/home">Masuk</a>.</p>
            </div>
        </div>
        <div class="right-side"
            style="background-image: url('{{ Vite::asset('resources/images/bg-rightside.png') }}'); background-size: cover; background-position: center;">
            <div class="logo-container">
                <img src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}" alt="Logo 1" class="logo">
                <img src="{{ Vite::asset('resources/images/Logo_Web.png') }}" alt="Logo 2" class="logo">
            </div>
        </div>
    </div>
@endsection
