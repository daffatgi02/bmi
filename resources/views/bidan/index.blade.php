@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section">
        <div class="content">
            <h1 class="m-3">Dashboard </h1>
            <div class="container mt-3 pt-3">
                <div class="row ">
                    {{-- Total Anak --}}
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card" style="width: 18rem; max-width:18rem; height: 15rem; max-height:15rem;">
                            <div class="card-body bg-info">
                                <h5 class="card-title fw-bold">Total Anak</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary mb-3">Pada Posyandu Kelurahan Japan</h6>
                                <div class="d-flex">
                                    <h1 class="me-2">{{ $danaks->count() }}</h1>
                                    <p>
                                        Laki-laki: {{ $danaks->where('jk', 'L')->count() }} <br>
                                        Perempuan: {{ $danaks->where('jk', 'P')->count() }}
                                    </p>
                                </div>
                                <a href="{{ route('danaks.index') }}" class="btn btn-light">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Total Posyandu --}}
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card" style="width: 18rem; max-width:18rem; height: 15rem; max-height:15rem;">
                            <div class="card-body bg-warning">
                                <h5 class="card-title fw-bold">Total Posyandu</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary mb-3">Pada Posyandu Kelurahan Japan</h6>
                                <h1>{{ $dposyandus->count() }}</h1>
                                <a href="{{ route('dposyandus.index') }}" class="btn btn-light">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card " style="width: 18rem; max-width:18rem; height: 15rem; max-height:15rem;">
                            <div class="card-body bg-danger ">
                                <h5 class="card-title fw-bold">Total Pendataan</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary mb-3">Pada Posyandu Kelurahan Japan</h6>
                                <div class="d-flex">
                                    <h1 class="me-2">{{ $dbulans->count() }}</h1>
                                    <p>
                                        Stunting: {{ $dbulans->where('st_anak', 'Stunting')->count() }} <br>
                                        Tidak Stunting: {{ $dbulans->where('st_anak', 'Tidak Stunting')->count() }}
                                    </p>
                                </div>
                                <a href="{{ route('dbulanans.index') }}" class="btn btn-light">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-12 mb-3">
                        <div class="card" style="width: 18rem; max-width:18rem; height: 15rem; max-height:15rem;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">Total Anak</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of
                                    the
                                    card's content.</p>
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
