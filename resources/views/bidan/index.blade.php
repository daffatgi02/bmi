@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section">
        <div class="content">
            <h1 class="m-3 text-decoration-underline">Dashboard </h1>
            <div class="container mt-3 pt-3">
                <div class="row ">
                    {{-- Total Anak --}}
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-12 mb-3">
                        <div class="card text-bg-info"
                            style="width: 18rem; max-width:18rem; height: 15rem; max-height:15rem;">
                            <h5 class="card-header fw-bold"> <i class='bx bx-user'></i> Total Anak</h5>
                            <div class="card-body">
                                <h6 class="card-title">Pada Posyandu Kelurahan Japan</h6>
                                <div class="d-flex">
                                    <h1 class="me-2">{{ $danaks->count() }}</h1>
                                    <p>
                                        Laki-laki: {{ $danaks->where('jk', 'L')->count() }} <br>
                                        Perempuan: {{ $danaks->where('jk', 'P')->count() }}
                                    </p>
                                </div>
                                <a href="{{ route('danaks.index') }}" class="btn btn-light" id="btn-detail-dashboard">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Total Posyandu --}}
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-12 mb-3">
                        <div class="card text-bg-warning"
                            style="width: 18rem; max-width:18rem; height: 15rem; max-height:15rem;">
                            <h5 class="card-header fw-bold"><i class='bx bx-building-house'></i> Total Posyandu</h5>
                            <div class="card-body">
                                <h6 class="card-title">Pada Posyandu Kelurahan Japan</h6>
                                <div class="d-flex">
                                    <h1>{{ $dposyandus->count() }}</h1>
                                </div>
                                <a href="{{ route('dposyandus.index') }}" class="btn btn-light" id="btn-detail-dashboard">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-12 mb-3">
                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-12 mb-3">
                            <div class="card text-bg-danger"
                                style="width: 18rem; max-width:18rem; height: 15rem; max-height:15rem;">
                                <h5 class="card-header fw-bold"><i class='bx bx-table'></i> Total Pendataan</h5>
                                <div class="card-body">
                                    <h6 class="card-title">Pada Posyandu Kelurahan Japan</h6>
                                    <div class="d-flex">
                                        <h1 class="me-2">{{ $dbulans->count() }}</h1>
                                        <p>
                                            Stunting: {{ $dbulans->where('st_anak', 'Stunting')->count() }} <br>
                                            Tidak Stunting: {{ $dbulans->where('st_anak', 'Tidak Stunting')->count() }}
                                        </p>
                                    </div>
                                    <a href="{{ route('dbulanans.index') }}" class="btn btn-light" id="btn-detail-dashboard">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PESAN ERROR --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection
