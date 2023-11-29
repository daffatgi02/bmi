@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="content">
            <h1 class="m-3 text-decoration-underline">Halaman Data Anak</h1>
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <div class="col-md-3 col-lg-2 col-7 offset-md-9 offset-lg-10 offset-5 mb-4 d-grid">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn shadow" data-bs-toggle="modal" id="btn-tambah"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-plus-circle me-2"></i>Data Anak
                        </button>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered datatable shadow" id="tabelanak"
                            style="width: 100%">
                            <thead class="fw-bold">
                                <tr>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">id</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">No.</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center w-50">Nama</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">NIK</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">No WA</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">Jenis Kelamin</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center w-25">Tempat Lahir</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">Umur</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">Tanggal Lahir</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center w-25">Posyandu</th>
                                    <th style="background-color: #272343; color:#E3F6F5" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                @include('actions.tambahanak')
            </div>
        </div>
    </div>

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
                pagingType: 'simple_numbers',
                responsive: true,

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
                        data: "nik_anak",
                        name: "nik_anak",
                        className: 'align-middle',
                        // visible:false,

                    },
                    {
                        data: "nowa",
                        name: "nowa",
                        className: 'align-middle',
                        visible: false,

                    },
                    {
                        data: "jk",
                        name: "jk",
                        className: 'align-middle',

                    },
                    {
                        data: "tempat_lahir",
                        name: "tempat_lahir",
                        className: 'align-middle',

                    },
                    // logika untuk mendapatkan umur
                    {
                        data: "tanggal_lahir",
                        name: "tanggal_lahir",
                        className: 'align-middle',
                        render: function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                // Hitung umur berdasarkan tanggal_lahir
                                var birthDate = new Date(data);
                                var today = new Date();
                                var ageDate = new Date(today - birthDate);
                                var years = ageDate.getUTCFullYear() - 1970;
                                var months = ageDate.getUTCMonth();
                                var days = ageDate.getUTCDate() - 1;

                                // Aturan penampilan umur
                                if (years < 1) {
                                    if (months < 1) {
                                        return "±" + days + " hari";
                                    } else {
                                        return months + " bulan";
                                    }
                                } else {
                                    return years + " tahun";
                                }
                            } else {
                                // Tampilkan data tanggal_lahir biasa untuk pengurutan
                                return data;
                            }
                        },
                    },

                    {
                        data: "tanggal_lahir",
                        name: "tanggal_lahir",
                        className: 'align-middle',
                        visible: false,
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
                        width: "10%",
                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false,
                        className: 'align-middle',


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
