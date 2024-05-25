@extends('layouts.appnav')


@section('content')
    @include('layouts.navbaradmin')
    <section class="home-section mb-5">
        <div class="content">
            <div class="container mt-3 pt-3">
                <h1 class="fw-bold h mb-4">Riwayat </h1>
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
