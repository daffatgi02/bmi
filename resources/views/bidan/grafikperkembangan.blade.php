@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <h1 class="fw-bold h mb-4">Halaman Grafik Perkembangan </h1>
                    <div class="mb-2">
                        <select class="form-select border border-dark" aria-label="Default select example">
                            <option selected disabled>-Pilih Posyandu</option>
                            @foreach ($dbulans as $dbulans)
                                <option>{{ $dbulans->danaks->t_posyandu }}</option>
                            @endforeach
                        </select>

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
