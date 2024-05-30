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
    <div class="d-none d-md-block">
        @include('layouts.navbar')
    </div>
    <section class="home-section">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="d-flex mb-4">
                    <div class="d-flex">
                        <span class="fw-bold h1">Grafik Persebaran</span>
                    </div>
                    <div class="ms-auto d-block d-md-none">
                        <a id="batal" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
           document.getElementById('logout-form').submit();"
                            class="btn btn-keluar">
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-box-arrow-left me-0 me-md-2"></i>
                                <span class="d-none d-md-block">Keluar</span>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="row ">
                    <div class="mb-2">
                        <form method="GET" action="{{ route('gperkembangans.index') }}">
                            <div class="d-flex flex-row">
                                <select class="form-select border border-dark select_posyandu"
                                    aria-label="Default select example" name="posyandu">
                                    <option selected disabled value="null">- Pilih Posyandu</option>
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
    <div class="d-block d-md-none">
        @include('layouts.bottombar2')
    </div>


    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    {{-- PESAN ERROR --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menampilkan overlay saat halaman dimuat
            document.querySelector('.loading-overlay').style.display = 'flex';

            // Sembunyikan overlay setelah 2 detik setelah semua konten dimuat
            window.addEventListener('load', function() {
                setTimeout(function() {
                    document.querySelector('.loading-overlay').style.display = 'none';
                }, 1000); // 2 detik (dalam milidetik)
            });
        });


        // btn POSYANDU EXCEL
        document.addEventListener('DOMContentLoaded', function() {
            var dropdown = document.querySelector('.select_posyandu');

            dropdown.addEventListener('change', function() {
                // Jika ada posyandu yang dipilih
                if (this.value !== 'null') {
                    // Ambil nilai dari dropdown
                    var posyandu = this.value;
                    // Redirect halaman ke URL dengan parameter posyandu yang dipilih
                    window.location.href = "{{ route('gperkembangans.index') }}?posyandu=" + posyandu;
                }
            });
        });
    </script>
@endsection
