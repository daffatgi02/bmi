@extends('layouts.appnav')


@section('content')
    <div class="d-none d-md-block">
        @include('layouts.navbaradmin')
    </div>
    <section class="home-section mb-5">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="d-flex mb-4">
                    <div class="d-flex">
                        <span class="fw-bold h1">Riwayat</span>
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
                <table class="table table-striped table-hover table-bordered datatable shadow" id="tabelriwayat"
                    style="width: 100%">
                    <thead class="fw-bold">
                        <tr>
                            <th id="th" class="text-center w-25">Nama</th>
                            <th id="th" class="text-center">Aktivitas</th>
                            <th id="th" class="text-center w-50">Data</th>
                            <th id="th" class="text-center w-25">Waktu</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    <div class="d-block d-md-none">
        @include('layouts.bottombar')
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $.fn.DataTable.ext.pager.numbers_length = 5;
            var dataTable = new DataTable('#tabelriwayat', {
                serverSide: true,
                processing: true,
                ajax: "gettabelriwayat",
                pagingType: "simple_numbers",
                responsive: true,
                columns: [{
                        data: "nama",
                        name: "nama",
                        className: 'align-middle',
                        orderable: false,

                    },
                    {
                        data: "aktivitas",
                        name: "aktivitas",
                        className: 'align-middle text-center',
                        orderable: false,

                    },
                    {
                        data: "data",
                        name: "data",
                        className: 'align-middle',
                        orderable: false,

                    },
                    {
                        data: "created_at",
                        name: "created_at",
                        className: ' align-middle text-center',
                        // width: "15%",
                        render: function(data) {
                            // Konversi data tanggal dari format default (biasanya ISO 8601) ke "DD-MM-YYYY"
                            if (data) {
                                var date = new Date(data);
                                var day = date.getDate();
                                var month = date.getMonth() +
                                    1; // Perlu ditambahkan 1 karena Januari dimulai dari 0
                                var year = date.getFullYear();
                                // Format tanggal dalam "DD-MM-YYYY"
                                return day.toString().padStart(2, '0') + '-' + month.toString()
                                    .padStart(2, '0') + '-' + year;
                            } else {
                                return '';
                            }
                        },
                    },

                ],
                order: [
                    [3, "desc"]
                ],
                lengthMenu: [
                    [100, -1],
                    [100, "All"],
                ],
                language: {
                    search: "Cari", // Mengganti teks "Search" menjadi "Cari"
                },
            });
        });
    </script>
@endpush
