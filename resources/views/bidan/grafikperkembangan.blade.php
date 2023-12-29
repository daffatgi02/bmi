@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <h1 class="fw-bold h mb-4">Halaman Grafik Perkembangan </h1>
                    <div class="mb-2">
                        <form method="GET" action="{{ route('gperkembangans.index') }}">
                            <div class="d-flex flex-row">
                                <select class="form-select border border-dark" aria-label="Default select example"
                                    name="posyandu">
                                    <option selected disabled>-Pilih Posyandu-</option>
                                    @php
                                        $uniquePosyandus = [];

                                        foreach ($dbulans as $dbulan) {
                                            $posyandu = $dbulan->danaks->dposyandu->nama_posyandu;

                                            if (!in_array($posyandu, $uniquePosyandus)) {
                                                $uniquePosyandus[] = $posyandu;
                                            }
                                        }

                                        sort($uniquePosyandus); // Mengurutkan array dari A-Z
                                    @endphp

                                    @foreach ($uniquePosyandus as $posyandu)
                                        <option>{{ $posyandu }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success ms-2">Tampilkan</button>
                            </div>
                        </form>

                    </div>
                    <div class="mt-3 shadow rounded rounded-3">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    {{-- PESAN ERROR --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection
