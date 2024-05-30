@extends('layouts.appauth')

@section('content')
    <div class="content">
        <div class="left-side">
            <div class="login-box">
                <div class="d-flex flex-column align-items-center mb-5">
                    <span class="fs-2 fw-bold"> Orang Tua Balita </span>
                    <hr class="hr-landingpage border border-white border-1 mt-0 mb-4 opacity-100 w-100">
                    <a href="{{ route('ekms.index') }}" class="btn btn-menu w-100 mb-3">
                        <span class="fs-5">
                            <i class="bi bi-graph-up"></i> E-KMS
                        </span>
                    </a>
                    <a href="{{ route('antrians.index') }}" class="btn btn-menu w-100 ">
                        <span class="fs-5">
                            <i class="bi bi-person-lines-fill"></i> Daftar Antrian
                        </span>
                    </a>
                </div>
                <div class="d-flex flex-column align-items-center">
                    <p><a class="link-underline-light text-white h2"> </a></p>
                    <span class="fs-2 fw-bold"> Bidan & Kader </span>
                    <hr class="hr-landingpage border border-white border-1 mt-0 mb-4 opacity-100 w-100">
                    <a href="/login" class="btn btn-menu w-100 mb-3">
                        <span class="fs-5">
                            <i class="bi bi-box-arrow-in-right"></i> Masuk
                        </span>
                    </a>
                </div>
                <div class="footer-landingpage text-center mt-5 d-block d-md-none">
                    <img src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}" alt="Logo 1" class="logofoot">
                    <img src="{{ Vite::asset('resources/images/Logo_Web.png') }}" alt="Logo 2" class="logofoot">
                </div>
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
