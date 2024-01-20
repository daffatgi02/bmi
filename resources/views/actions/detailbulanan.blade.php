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
    <section class="home-section mb-5">
        <div class="mt-2 p-4">
            @if (count($dbulanans) > 0)
                <button id="printButton" class="d-none">Cetak Halaman</button>
                <p class="text-center fs-3 fw-bold mb-3">
                    Data Bulanan - {{ $dbulanans[0]->danaks->nama_anak }}
                </p>
            @endif
            <div class="row">
                <div class="col-12 pe-4 pe-none">
                    {!! $chart->container() !!}
                </div>
                <div class="col-12 pe-4 pe-none">
                    {!! $chart2->container() !!}
                </div>
                <div class="col-12 pe-4 pe-none">
                    {!! $chart3->container() !!}
                </div>


                <div class="col-12 mt-4 mb-5 table-container">
                    <!-- Tambahkan elemen pembatas untuk memulai halaman baru -->
                    <div class="page-break"></div>

                    <table class="table table-striped table-hover table-bordered datatable shadow" id="example"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th id="th" class="text-center align-middle w-25">Nama</th>
                                <th id="th" class="text-center align-middle w-25">Umur Periksa</th>
                                <th id="th" class="text-center align-middle">Berat Badan</th>
                                <th id="th" class="text-center align-middle">Tinggi Badan</th>
                                <th id="th" class="text-center align-middle">Lingkar Lengan</th>
                                <th id="th" class="text-center align-middle">Lingkar Kepala</th>
                                <th id="th" class="text-center align-middle w-25">Status</th>
                                <th id="th" class="text-center align-middle w-25">Tanggal Periksa</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($dbulanans as $data)
                                <tr>
                                    <td class="text-center">{{ $data->danaks->nama_anak }}</td>
                                    <td class="text-center">{{ $data->umur_periksa }}</td>
                                    <td class="text-center">{{ $data->bb_anak }} kg</td>
                                    <td class="text-center">{{ $data->tb_anak }} cm</td>
                                    <td class="text-center">{{ $data->ll_anak }} cm</td>
                                    <td class="text-center">{{ $data->lk_anak }} cm</td>
                                    <td class="text-center fw-bold"
                                        style="color: {{ $data->st_anak === 'Normal' ? 'mediumseagreen' : ($data->st_anak === 'Gizi Buruk' ? 'red' : ($data->st_anak === 'Gizi Kurang' ? 'darkorange' : ($data->st_anak === 'Kelebihan Berat Badan' ? 'darkblue' : 'black'))) }}">
                                        {{ $data->st_anak }}
                                    </td>

                                    <td class="text-center">{{ $data->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                }, 2500); // 2 detik (dalam milidetik)
            });
        });
    </script>
    {{-- </section> --}}

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ $chart2->cdn() }}"></script>
    {{ $chart2->script() }}
    <script src="{{ $chart3->cdn() }}"></script>
    {{ $chart3->script() }}


    <script>
        // Fungsi ini dipanggil setelah delay 1.5 detik
        new DataTable('#example', {
            responsive: true,
            lengthChange: false, // Menghilangkan opsi page length
            paging: false, // Menghilangkan paging (halaman)
            searching: false,
            pageLength: -1 // Menghilangkan kotak pencarian
        });
    </script>
@endsection
