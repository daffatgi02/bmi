@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="content">
            <div class="container mt-3 pt-3">
                <h1 class="fw-bold h mb-4">Data Anak</h1>
                <div class="d-flex flex-row justify-content-end mb-3">
                    <button type="button" class="btn d-flex shadow me-sm-3 me-2 mb-3 mb-md-0" data-bs-toggle="modal" id="btn-tambah"
                        data-bs-target="#exampleModal2">
                        <i class="bi bi-list-task me-sm-2 me-0"></i><label class="d-sm-block d-none">Tambah Antrian</label>
                    </button>
                    <button type="button" class="btn d-flex shadow me-sm-3 me-2 mb-3 mb-md-0 " data-bs-toggle="modal" id="btn-tambah"
                        data-bs-target="#exampleModal">
                        <i class="bi bi-person-fill-add me-sm-2 me-0"></i><label class="d-sm-block d-none">Data Anak</label>
                    </button>
                </div>
                <div class="row ">
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered datatable shadow" id="tabelanak"
                            style="width: 100%">
                            <thead class="fw-bold">
                                <tr>
                                    <th id="th" class="text-center">id</th>
                                    <th id="th" class="text-center">No.</th>
                                    <th id="th" class="text-center w-25">Nama</th>
                                    <th id="th" class="text-center  w-25">NIK</th>
                                    <th id="th" class="text-center">Jenis Kelamin
                                    </th>
                                    <th id="th" class="text-center  w-25">Umur</th>
                                    <th id="th" class="text-center w-25">Posyandu
                                    </th>
                                    <th id="th" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Anak-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                @include('actions.tambahanak')
            </div>
        </div>
    </div>
    {{-- Modal Antrian --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                @include('actions.tambahantrian')
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
                        className: 'align-middle text-center',
                        // visible:false,

                    },
                    {
                        data: "jk",
                        name: "jk",
                        className: 'align-middle text-center',

                    },
                    // logika untuk mendapatkan umur
                    {
                        data: "tanggal_lahir",
                        name: "tanggal_lahir",
                        className: 'align-middle text-center',
                        render: function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                var birthDate = new Date(data);
                                var today = new Date();
                                var ageDate = new Date(today - birthDate);
                                var years = ageDate.getUTCFullYear() - 1970;
                                var months = ageDate.getUTCMonth();
                                var days = ageDate.getUTCDate() - 1;

                                if (years < 1) {
                                    if (months < 1) {
                                        return "±" + days + " hari";
                                    } else {
                                        return months + " bulan";
                                    }
                                } else {
                                    var ageString = years + " tahun";
                                    if (months > 0) {
                                        ageString += " " + months + " bulan";
                                    }
                                    return ageString;
                                }
                            } else {
                                return data;
                            }
                        }

                    },


                    {
                        data: "dposyandu.nama_posyandu",
                        name: "dposyandu.nama_posyandu",
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
                    [100, -1],
                    [100, "All"],
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
