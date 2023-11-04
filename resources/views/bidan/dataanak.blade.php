@extends('layouts.appnav')

@section('content')
    {{-- Tampilan PC/Laptop --}}

    <div class="d-md-block">
        @include('layouts.navbar')
        <section class="home-section">
            <div class="content">
                <h1 class="m-3">Halaman Data Anak</h1>
                <div class="container mt-3 pt-3">
                    <div class="row ">
                        <div class="col-md-3 col-lg-2 col-7 offset-md-9 offset-lg-10 offset-5 mb-3 d-grid">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary shadow" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-plus-circle me-2"></i>Data Anak
                            </button>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive border border-dark-subtle p-3 shadow rounded-3">
                                <table class="table table-striped table-bordered border" id="tabelanak">
                                    <thead class="fw-bold table-info ">
                                        <tr >
                                            <td class="text-center">id</td>
                                            <td class="text-center">No.</td>
                                            <td class="text-center">Nama</td>
                                            <td class="text-center">Jenis Kelamin</td>
                                            <td class="text-center">Tempat Lahir</td>
                                            <td class="text-center">Umur</td>
                                            <td class="text-center">Tanggal Lahir</td>
                                            <td class="text-center">Posyandu</td>
                                            <td class="text-center">Opsi</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    @include('actions.tambahanak')
                </div>
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
            $('#tabelanak').DataTable({
                serverSide: true,
                processing: true,
                ajax: "gettabelanak",
                responsive: true, // Enable responsive extension
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
                        className: 'text-center align-middle',
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
                        className: 'text-center align-middle',
                        width: "10%",
                        render: function(data, type, row, meta) {
                            return data + ' Tahun';
                        }
                    },
                    {
                        data: "tanggal_lahir",
                        name: "tanggal_lahir",
                        className: 'text-center align-middle',

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
                        className: 'align-middle text-center',
                        width: "5%"

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
        });
    </script>
@endpush
