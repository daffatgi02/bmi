@extends('layouts.appbalita')

{{-- note bracnh develope --}}
@section('content')
    <div class="container mt-3 mb-4">
        <div class="d-flex justify-content-end mt-3 ms-3 mb-5">
            <a id="batal" href="/" class="btn btn-keluar">
                <div class="d-flex flex-row">
                    <i class="bi bi-box-arrow-left me-0 me-md-2"></i>
                    <span class="d-none d-md-block">Kembali</span>
                </div>
            </a>
        </div>

        <div class="d-block d-md-none mb-5 text-center">
            <img class="mx-auto d-block" src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}" alt="logo"
                style="width: 50%;">
            <p class="fw-bold fs-2">
                E-KMS Posyandu Japan
            </p>
        </div>
        <div class="d-flex flex-row justify-content-center align-items-center">
            <div class="w-100 d-none d-md-block">
                <div class="view1 w-100 rounded-top vstack p-3">
                    <img class="mx-auto d-block" src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}"
                        alt="logo" style="width: 50%;">
                    <p class="fw-bold fs-5 text-center">
                        E-KMS
                    </p>
                    <p class="fw-bold fs-5 text-center">
                        Posyandu Desa Japan
                    </p>
                </div>
            </div>
            <div class="w-100">
                <table class="table table-striped table-hover table-bordered datatable shadow" id="ekms"
                    style="width: 100%">
                    <thead class="fw-bold">
                        <tr>
                            <th id="th" class="text-center">Nama</th>
                            <th id="th" class="text-center">NIK</th>
                            <th id="th" class="text-center">Posyandu</th>
                            <th id="th" class="text-center">Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        (function() {
            function hideNIK(nik) {
                // Mengambil 8 karakter pertama dari NIK
                var prefix = nik.substring(0, 8);
                var hiddenPart = nik.substring(8).replace(/./g, '*');
                return prefix + hiddenPart;
            }

            $(document).ready(function() {
                var dataTable = new DataTable('#ekms', {
                    serverSide: true,
                    processing: true,
                    ajax: "getekms",
                    pagingType: "simple",
                    responsive: true,
                    columns: [{
                            data: "danaks.nama_anak",
                            name: "danaks.nama_anak",
                            className: 'align-middle',
                            searchable: true,
                            orderable: true,
                        },
                        {
                            data: "danaks.nik_anak",
                            name: "danaks.nik_anak",
                            className: 'align-middle text-center',
                            searchable: true,
                            orderable: true,
                            render: function(data, type, row, meta) {
                                return hideNIK(data);
                            }
                        },
                        {
                            data: "nama_posyandu",
                            name: "nama_posyandu",
                            className: 'align-middle',
                            searchable: false,
                            orderable: true,
                        },
                        {
                            data: "actionsekms",
                            name: "actionsekms",
                            orderable: false,
                            searchable: false,
                            className: 'align-middle',
                            width: "5%"
                        },
                    ],
                    order: [
                        [0, "asc"]
                    ],
                    lengthMenu: [
                        [10],
                        [10],
                    ],
                    language: {
                        search: "Cari", // Mengganti teks "Search" menjadi "Cari"
                    },
                });
            });
        })();
    </script>
@endpush
