@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="container mt-3 pt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">

                    {{-- {{ $dbulanans->danaks->nama_anak }} --}}
                    {!! $chart->container() !!}

                </div>
            </div>
        </div>
    </section>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection
