@extends('layouts.appnav')

@section('content')
    <div class="d-none d-md-block">
        @include('layouts.navbar')
    </div>
    <section class="home-section mb-5">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="d-flex mb-4">
                    <div class="d-flex">
                        <span class="fw-bold h1">Data Posyandu</span>
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
                    <div class="d-flex flex-row justify-content-end mb-3">
                        <button type="button" class="btn d-flex shadow me-sm-3 me-2 mb-3 mb-md-0 " data-bs-toggle="modal"
                            id="btn-tambah" data-bs-target="#exampleModal">
                            <i class="bi bi-plus-circle me-sm-2 me-0"></i><label class="d-sm-block d-none">Posyandu</label>
                        </button>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered datatable shadow" id="tabelposyandu"
                            style="width: 100%">

                            <thead class="fw-bold">
                                <tr>
                                    <th id="th" class="text-center">id</th>
                                    <th id="th" class="text-center">No.</th>
                                    <th id="th" class="text-center w-25">Nama Posyandu</th>
                                    <th id="th" class="text-center w-25">Alamat Posyandu</th>
                                    <th id="th" class="text-center w-25">Puskesmas</th>
                                    <th id="th" class="text-center w-25">Kelurahan</th>
                                    <th id="th" class="text-center w-50">RW</th>
                                    <th id="th" class="text-center w-50">RT</th>
                                    <th id="th" class="text-center">Opsi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Posyandu-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                @include('actions.tambahposyandu')
            </div>
        </div>
    </div>
    <div class="d-block d-md-none">
        @include('layouts.bottombar2')
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
            var dataTable = new DataTable('#tabelposyandu', {
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: "gettabelposyandu",
                pagingType: "simple_numbers",
                columns: [{
                        data: "id",
                        name: "id",
                        visible: false
                    },
                    {
                        data: "DT_RowIndex",
                        name: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        visible: false,
                        className: 'text-center align-middle',
                        render: function(data, type, row, meta) {
                            return data + '.';
                        }
                    },
                    {
                        data: "nama_posyandu",
                        name: "nama_posyandu",
                        className: 'align-middle',
                        // orderable: false,

                    },
                    {
                        data: "lokasi_posyandu",
                        name: "lokasi_posyandu",
                        className: 'align-middle',
                        orderable: false,

                    },
                    {
                        data: "pkm",
                        name: "pkm",
                        className: 'align-middle',
                        orderable: false,


                    },
                    {
                        data: "kel",
                        name: "kel",
                        className: 'align-middle',
                        orderable: false,

                    },
                    {
                        data: "rw",
                        name: "rw",
                        className: 'align-middle',
                        orderable: false,

                    },
                    {
                        data: "rt",
                        name: "rt",
                        className: 'align-middle',
                        orderable: false,


                    },
                    {
                        data: "actions",
                        name: "actions",
                        orderable: false,
                        searchable: false,
                        className: 'align-middle'
                    },
                ],
                order: [
                    [0, "desc"]
                ],
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"],
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
