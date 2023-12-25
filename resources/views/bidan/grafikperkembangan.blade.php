@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <h1 class="fw-bold h mb-4">Halaman Grafik Perkembangan </h1>
                    <div>
                        {!! $chart->container() !!}
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12 col-12">
                        tes
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
