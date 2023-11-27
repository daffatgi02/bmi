@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="content">
            <h1 class="m-3">Halaman Data Posyandu</h1>
            <div class="container mt-3 pt-3">
                <div class="row ">
                    <div class="col-md-3 col-lg-2 col-7 offset-md-9 offset-lg-10 offset-5 mb-4 d-grid">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-plus-circle me-2"></i>Posyandu
                        </button>
                    </div>
                    <div class="col-12">
                        <table class="table table-striped table-hover table-bordered datatable shadow" id="tabelposyandu" style="width: 100%">

                            <thead class="fw-bold table-warning ">
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">No.</th>
                                    <th class="text-center w-50">Nama Posyandu</th>
                                    <th class="text-center w-50">Alamat Posyandu</th>
                                    <th class="text-center">Opsi</th>
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
        <div class="modal-dialog">
            <div class="modal-content">
                @include('actions.tambahposyandu')
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
            var dataTable = new DataTable('#tabelposyandu', {
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: "gettabelposyandu",
                pagingType: "simple_numbers",
                fixedHeader: true,
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

                    },
                    {
                        data: "lokasi_posyandu",
                        name: "lokasi_posyandu",
                        className: 'align-middle',

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
