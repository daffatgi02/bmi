@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="content">
            <h1 class="m-3">Halaman Data Anak</h1>
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <div class="col-md-3 col-lg-2 col-7 offset-md-9 offset-lg-10 offset-5 mb-4 d-grid">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-plus-circle me-2"></i>Data Anak
                        </button>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered datatable shadow" id="tabelanak" style="width: 100%">
                            <thead class="fw-bold table-info">
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Tempat Lahir</th>
                                    <th class="text-center">Umur</th>
                                    <th class="text-center">Tanggal Lahir</th>
                                    <th class="text-center">Posyandu</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- PESAN ERROR --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $.fn.DataTable.ext.pager.numbers_length = 5;
            var dataTable = new DataTable('#tabelanak', {
                serverSide: true,
                processing: true,
                ajax: "gettabelanak",
                pagingType:'simple',
                responsive: true, // Enable responsive extension
                columns: [{
                        data: "id",
                        name: "id",
                        visible: false
                    },
                    {
                        visible: false,

                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        width: "5%",
                        className: 'text-center align-middle',
                        render: function(data, type, row, meta) {
                            return data + '.';
                        }
                    },
                    {
                        data: "nama_anak",
                        name: "nama_anak",
                        className: 'align-middle',

                    },
                    {
                        data: "jk",
                        name: "jk",
                        className: 'align-middle',
                        width: "5%",
                    },
                    {
                        data: "tempat_lahir",
                        name: "tempat_lahir",
                        className: 'align-middle',

                    },
                    {
                        data: "umur",
                        name: "umur",
                        className: 'align-middle',
                        width: "10%",

                    },
                    {
                        data: "tanggal_lahir",
                        name: "tanggal_lahir",
                        className: 'align-middle',
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
                    {
                        data: "t_posyandu",
                        name: "t_posyandu",
                        className: 'align-middle',
                        width: "20%",
                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false,
                        className: 'align-middle',
                        width: "5%"

                    },
                ],
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"],
                ],

            });

            $(".datatable").on("click", ".btn-delete", function(e) {
                e.preventDefault();

                var form = $(this).closest("form");

                Swal.fire({
                    title: "Apakah Anda Yakin Menghapus Data " + "?",
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Ya, hapus!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
