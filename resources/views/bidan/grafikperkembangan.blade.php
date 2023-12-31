@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <div class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <label>Loading</label>
        </div>
    </div>
    <section class="home-section">
        <div class="content">
            {{-- <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <label>Loading</label> --}}
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <h1 class="fw-bold h mb-4">Halaman Grafik Perkembangan </h1>
                    <div class="mb-2">
                        <form method="GET" action="{{ route('gperkembangans.index') }}">
                            <div class="d-flex flex-row">
                                <select class="form-select border border-dark select_posyandu"
                                    aria-label="Default select example" name="posyandu">
                                    <option selected disabled value="null">-Pilih Posyandu-</option>
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
                                <button type="submit" class="btn btn-success ms-2" id="tampilkanBTN"
                                    disabled>Tampilkan</button>
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
            var button = document.getElementById('tampilkanBTN');

            dropdown.addEventListener('change', function() {
                if (this.value !== 'null') {
                    button.removeAttribute('disabled');
                } else {
                    button.setAttribute('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
