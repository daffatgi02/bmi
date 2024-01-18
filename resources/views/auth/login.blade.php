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
            <div class="col-md-6 mt-md-4 mt-5 pt-md-0 pt-5">
                <div class="card shadow mb-3">
                    <div class="card-header" id="calc-stunting">
                        <h2>Login</h2>
                    </div>
                    @guest
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 d-md-block d-none mt-3">
                                        <img class="img-fluid" src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}"
                                            alt="logo"style="width: auto;">
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-12">
                                        <div class="row mb-3">
                                            <label for="email" class="col-form-label fw-bold">Email</label>
                                            <div class="col-md-12 ">
                                                <input id="email" type="email"
                                                    class="form-control shadow @error('email') is-invalid @enderror border border-dark-subtle"
                                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                                    autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>Maaf, Perikasa Kembali Email dan Password</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class=" col-form-label fw-bold">Password</label>

                                            <div class="col-md-12">
                                                <input id="password" type="password"
                                                    class="form-control shadow @error('password') is-invalid @enderror border border-dark-subtle"
                                                    name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input border border-secondary shadow"
                                                        type="checkbox" name="remember" id="remember"
                                                        {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        Ingat Saya
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-0 d-flex justify-content-center">
                                            <div class="col-md-8 d-grid col">
                                                <button type="submit" class="btn btn-logreg fw-bold shadow">
                                                    Masuk
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="mt-5 mb-5 ms-3">
                            <h4>
                                Anda Sudah Login, Silahkan
                                <a href="{{ route('bidans.index') }}" class="btn btn-primary ms-2 mt-2"> Masuk </a>
                            </h4>
                        </div>
                    @endguest
                </div>
                {{-- <a href="{{ route('antrians.index') }}" class="link-secondary link-offset-2 link-opacity-75-hover">
                    <i class="bi bi-hourglass-split me-2"></i>Daftar Antrian
                </a> --}}
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
