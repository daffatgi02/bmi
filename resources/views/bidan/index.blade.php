@extends('layouts.appnav')

@section('content')
    <div class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <label>Loading</label>
        </div>
    </div>
    @include('layouts.navbar')
    <section class="home-section">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <h1 class="fw-bold h mb-4">Dashboard</h1>

                    <div class="row">
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-12 mb-3">
                            <div class="card shadow rounded-2" id="card-dash">
                                <h5 class="card-header fw-bold"> <i class='bx bx-user'></i> Total Anak</h5>
                                <div class="card-body rounded-bottom-2" id="card-body-dash">
                                    <h6 class="card-title">Pada Posyandu Kelurahan Japan</h6>
                                    <div class="d-flex flex-row">
                                        <h1 class="me-2 fw-bold">{{ $danaks->count() }}</h1>
                                        <p class="fw-bold">
                                            Laki-laki: {{ $danaks->where('jk', 'L')->count() }} <br>
                                            Perempuan: {{ $danaks->where('jk', 'P')->count() }}
                                        </p>
                                    </div>
                                    <div class="d-xxl-block d-none">
                                        <a href="{{ route('danaks.index') }}" class="btn btn-light fw-bold"
                                            id="btn-detail-dashboard">
                                            <i class="bi bi-info-circle me-1"></i> Detail
                                        </a>
                                    </div>
                                    <div class="d-xxl-none d-block d-flex justify-content-end">
                                        <a href="{{ route('danaks.index') }}" class="btn btn-light fw-bold"
                                            id="btn-detail-dashboard">
                                            <i class="bi bi-info-circle me-1"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-12 mb-3">
                            <div class="card shadow rounded-2" id="card-dash">
                                <h5 class="card-header fw-bold"><i class='bx bx-building-house'></i> Total Posyandu</h5>
                                <div class="card-body rounded-bottom-2" id="card-body-dash">
                                    <h6 class="card-title">Pada Posyandu Kelurahan Japan</h6>
                                    <div class="d-flex flex-row">
                                        <h1 class="fw-bold me-2">{{ $dposyandus->count() }}</h1>
                                        <p class="mt-2 fw-bold">
                                            Posyandu
                                        </p>
                                    </div>
                                    <div class="d-xxl-block d-none">
                                        <a href="{{ route('dposyandus.index') }}" class="btn btn-light fw-bold"
                                            id="btn-detail-dashboard">
                                            <i class="bi bi-info-circle me-1"></i> Detail
                                        </a>
                                    </div>
                                    <div class="d-xxl-none d-block d-flex justify-content-end">
                                        <a href="{{ route('dposyandus.index') }}" class="btn btn-light fw-bold"
                                            id="btn-detail-dashboard">
                                            <i class="bi bi-info-circle me-1"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-12 mb-3">
                            <div class="card shadow rounded-2" id="card-dash">
                                <h5 class="card-header fw-bold"><i class='bx bx-table'></i> Total Pendataan</h5>
                                <div class="card-body rounded-bottom-2" id="card-body-dash">
                                    <h6 class="card-title">Pada Posyandu Kelurahan Japan</h6>
                                    <div class="d-flex flex-row">
                                        <div class="d-flex flex-column me-4">
                                            <h1 class="me-2 fw-bold">{{ $dbulans->count() }}</h1>
                                            <div class="d-xxl-block d-none">
                                                <a href="{{ route('dbulanans.index') }}" class="btn btn-light fw-bold "
                                                    id="btn-detail-dashboard">
                                                    <i class="bi bi-info-circle me-1"></i> Detail
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row d-xxl-block d-none">
                                            <p class="fw-bold">
                                                <span class="badge text me-1" style="background-color:mediumseagreen"> -
                                                </span> {{ $dbulans->where('st_anak', 'Normal')->count() }} <br>
                                                <span class="badge text me-1" style="background-color:darkorange"> -
                                                </span> {{ $dbulans->where('st_anak', 'Gizi Kurang')->count() }} <br>
                                                <span class="badge text me-1" style="background-color:red"> - </span>
                                                {{ $dbulans->where('st_anak', 'Gizi Buruk')->count() }} <br>

                                            </p>
                                        </div>
                                        <div class="d-flex flex-row ms-2 d-xxl-block d-none">
                                            <p class="fw-bold">
                                                <span class="badge text me-1" style="background-color:darkblue"> - </span>
                                                {{ $dbulans->where('st_anak', 'Kelebihan Berat Badan')->count() }} <br>
                                                <span class="badge text me-1" style="background-color:rgb(2, 2, 35)"> -
                                                </span> {{ $dbulans->where('st_anak', 'Obesitas')->count() }}
                                            </p>
                                        </div>
                                        <div class="d-xxl-none d-sm-block d-none">
                                            <div class="d-flex flex-row fw-bold">
                                                <span class="badge text me-1" style="background-color:mediumseagreen"> -
                                                </span> {{ $dbulans->where('st_anak', 'Normal')->count() }}
                                                <span class="badge text me-1 ms-3" style="background-color:darkorange"> -
                                                </span> {{ $dbulans->where('st_anak', 'Gizi Kurang')->count() }}
                                                <span class="badge text me-1 ms-3" style="background-color:red"> -
                                                </span> {{ $dbulans->where('st_anak', 'Gizi Buruk')->count() }}
                                            </div>
                                            <div class="d-flex flex-row fw-bold mt-2">
                                                <span class="badge text me-1" style="background-color:darkblue"> -
                                                </span>{{ $dbulans->where('st_anak', 'Kelebihan Berat Badan')->count() }}
                                                <span class="badge text me-1 ms-3" style="background-color:rgb(2, 2, 35)"> -
                                                </span> {{ $dbulans->where('st_anak', 'Obesitas')->count() }}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-xxl-none d-block d-flex justify-content-end">
                                        <a href="{{ route('danaks.index') }}" class="btn btn-light fw-bold"
                                            id="btn-detail-dashboard">
                                            <i class="bi bi-info-circle me-1"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-12 mb-3">
                            <div class="card shadow rounded-2" id="card-dash">
                                <h5 class="card-header fw-bold"><i class='bx bx-walk'></i>Total Antrian</h5>
                                <div class="card-body rounded-bottom-2" id="card-body-dash">
                                    <h6 class="card-title">Pada Posyandu Kelurahan Japan</h6>
                                    <div class="d-flex flex-row">
                                        <h1 class="me-2 fw-bold">{{ $dantrians->count() }}</h1>
                                        <p class="mt-2 fw-bold">
                                            Antrian
                                        </p>
                                    </div>
                                    <div class="d-xxl-block d-none">
                                        <a href="{{ route('dbulanans.index') }}" class="btn btn-light fw-bold"
                                            id="btn-detail-dashboard">
                                            <i class="bi bi-info-circle me-1"></i> Detail
                                        </a>
                                    </div>
                                    <div class="d-xxl-none d-block d-flex justify-content-end">
                                        <a href="{{ route('dbulanans.index') }}" class="btn btn-light fw-bold"
                                            id="btn-detail-dashboard">
                                            <i class="bi bi-info-circle me-1"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total Anak --}}
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">

                    </div>

                    {{-- Total Posyandu --}}
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">

                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">

                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">

                    </div>
                    <div class="col-12 mb-4 mt-4">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menampilkan overlay saat halaman dimuat
            document.querySelector('.loading-overlay').style.display = 'flex';

            // Sembunyikan overlay setelah 2 detik setelah semua konten dimuat
            window.addEventListener('load', function() {
                setTimeout(function() {
                    document.querySelector('.loading-overlay').style.display = 'none';
                }, 1200); // 2 detik (dalam milidetik)
            });
        });
    </script>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}

    {{-- PESAN ERROR --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection
