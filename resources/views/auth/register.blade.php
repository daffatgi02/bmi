@extends('layouts.app')

@section('content')
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
                                    <input id="myPassword" type="password"
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
                                    <input id="myPassword2" type="password"
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
                                        <input class="form-check-input border border-secondary shadow"
                                            type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} onclick="myFunction()">

                                        <label class="form-check-label" for="remember">
                                            Tampilkan Password
                                        </label>
                                    </div>

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

        function myFunction() {
            var x = document.getElementById("myPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var z = document.getElementById("myPassword2");
            if (z.type === "password") {
                z.type = "text";
            } else {
                z.type = "password";
            }
        }
    </script>
@endsection
