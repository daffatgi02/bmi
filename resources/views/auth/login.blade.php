@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 pt-md-0 pt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    @guest
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror border border-dark-subtle"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Maaf, Perikasa Kembali Email dan Password</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror border border-dark-subtle"
                                            name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input border border-dark" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0 d-flex justify-content-center">
                                    <div class="col-md-4 d-grid col">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
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
                <a href="{{route('antrians.index')}}" class="btn btn-success mt-3">
                    <i class="bi bi-hourglass-split me-2"></i>Daftar Antrian
                </a>
            </div>
        </div>
    </div>
@endsection
