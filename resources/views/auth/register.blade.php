@extends('layouts.app')

@section('content')
    <div class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <label>Loading</label>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3 mb-3">
                    <div class="card-header" id="calc-stunting">
                        <h3>Registrasi</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end fw-bold">Nama</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control border border-secondary shadow  @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end fw-bold">Email
                                    Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control border border-secondary shadow @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end fw-bold">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control border border-secondary shadow @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end fw-bold">Konfirmasi
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                        class="form-control border-secondary shadow" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3 d-none">
                                <label for="level"
                                    class="col-md-4 col-form-label text-md-end fw-bold">{{ __('Level') }}</label>

                                <div class="col-md-6">
                                    <input id="level" type="text" class="form-control" name="level" value="kader">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input border border-secondary shadow" type="checkbox"
                                            name="cekLevel" id="cekLevel">
                                        <label class="form-check-label" for="cekLevel">
                                            Registrasi Sebagai bidan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 d-flex justify-content-center">
                                <div class="col-md-4 d-grid col">
                                    <button type="submit" class="btn btn-logreg fw-bold">
                                        Registrasi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="/login" class="link-dark link-offset-2 link-opacity-75-hover">
                    <i class="bi bi-box-arrow-in-up me-2 fw-bold"></i></i>Sudah Punya akun
                </a>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menampilkan overlay saat halaman dimuat
            document.querySelector('.loading-overlay').style.display = 'flex';

            // Sembunyikan overlay setelah 2 detik setelah semua konten dimuat
            window.addEventListener('load', function() {
                setTimeout(function() {
                    document.querySelector('.loading-overlay').style.display = 'none';
                }, 1000); // 2 detik (dalam milidetik)
            });
        });
    </script>
@endsection
