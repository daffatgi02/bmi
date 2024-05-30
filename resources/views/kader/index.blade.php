@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-end mt-3 ms-3">
            <a id="batal" href="{{ route('logout') }}"
                onclick="event.preventDefault();
           document.getElementById('logout-form').submit();"
                class="btn btn-keluar">
                <div class="d-flex flex-row align-items-center">
                    <i class="bi bi-box-arrow-left me-0 me-md-2"></i>
                    <span class="d-none d-md-block">Keluar</span>
                </div>
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <div class="d-flex flex row">
            <p class="fs-3 fw-bold ">
                Posyandu {{ $nama_posyandu }}
            </p>
            <div class="d-flex justify-content-start">
                <a class="btn d-flex me-sm-3 me-2 mb-3 mb-md-0" id="btn-tambah" href="{{ route('pposyandu') }}">
                    <i class="bi bi-chevron-left me-sm-2 me-0"></i>
                    <label class="d-sm-block d-none">Kembali</label>
                </a>
            </div>
            <div class="d-flex flex-row justify-content-end mb-3">
                <a class="btn btn-logreg btn d-flex me-sm-3 me-2 mb-3 mb-md-0" href="javascript:location.reload(true);">
                    <i class="bi bi-arrow-clockwise me-sm-2 me-0"></i>
                    <label class="d-sm-block d-none">Muat Ulang</label>
                </a>
                <button type="button" class="btn d-flex shadow me-sm-3 me-2 mb-3 mb-md-0" data-bs-toggle="modal"
                    id="btn-tambah" data-bs-target="#exampleModal2">
                    <i class="bi bi-list-task me-sm-2 me-0"></i><label class="d-sm-block d-none">Tambah Antrian</label>
                </button>
                <button type="button" class="btn d-flex shadow me-sm-3 me-2 mb-3 mb-md-0 " data-bs-toggle="modal"
                    id="btn-tambah" data-bs-target="#exampleModal">
                    <i class="bi bi-person-fill-add me-sm-2 me-0"></i><label class="d-sm-block d-none">Data Anak</label>
                </button>
            </div>
        </div>


        <!-- Modal Anak-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    @include('actions.tambahanak2')
                </div>
            </div>
        </div>
        {{-- Modal Antrian --}}
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    @include('actions.tambahantrian2')
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 mb-4">
                <div class="mt-2 px-1">
                    <table id="tabel_antrian" class="table table-bordered shadow" style="width:100%; display: block;">
                        <thead class="table-warning">
                            <tr>
                                <th id="th">Urutan</th>
                                <th id="th" class="w-100">Nama</th>
                                <th id="th">Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-antrian-body">
                            @php $nomor = 1; @endphp
                            @foreach ($dantrian as $dantrian)
                                <tr>
                                    <td class="text-center">
                                        {{ $nomor++ }}.
                                    </td>
                                    <td>
                                        {{ $dantrian->n_antrian }}
                                    </td>
                                    <td class="text-center">
                                        @include('actions.actionantrian2')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-6 mb-5 d-flex">
                @include('actions.kalkulatorkader')
            </div>
        </div>
        <div class="row mt-4">
            <p class="fs-3 fw-bold">
                Tabel Bulanan Posyandu {{ $nama_posyandu }}
            </p>
            <div class="col-12 mb-4">
                <div class="mt-2 px-1">
                    <table id="tabel_bulanan" class="table table-bordered shadow datatable" style="width:100%;">
                        <thead class="table-warning">
                            <tr>
                                <th id="th" class="text-center align-middle w-25 ">Nama</th>
                                <th id="th" class="text-center align-middle w-25">Umur</th>
                                <th id="th" class="text-center align-middle w-25">Tanggal
                                    Priksa
                                </th>
                                <th id="th" class="text-center align-middle w-25">
                                    Posyandu
                                </th>
                                <th id="th" class="text-center align-middle">Opsi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-bulanan-body">
                            @foreach ($dbulans as $dbulan)
                                <tr>
                                    <td>
                                        {{ $dbulan->danaks->nama_anak }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $dbulan->umur_tahun }} Tahun {{ $dbulan->umur_bulan }} Bulan
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ $dbulan->created_at->format('d-m-Y') }}
                                    </td>
                                    <td class="text-center align-middle">
                                        {{-- {{ $dbulan->danaks->dposyandu_id}} --}}
                                        {{ $dbulan->nama_posyandu }}
                                    </td>
                                    <td class="text-center align-middle">
                                        @include('actions.actionbulanankader')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        // Tabel Antrian
        $(document).ready(function() {
            var dataTable = new DataTable('#tabel_antrian', {
                pagingType: 'simple',
                responsive: true,
                lengthMenu: [
                    [6, 10],
                    [6, 10]
                ],
                language: {
                    search: "Cari", // Mengganti teks "Search" menjadi "Cari"
                },
            });
            var dataTable = new DataTable('#tabel_bulanan', {
                pagingType: 'simple',
                responsive: true,
                order: [
                    [2, "desc"]
                ],
                lengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"],
                ],
                language: {
                    search: "Cari", // Mengganti teks "Search" menjadi "Cari"
                },
            });

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
    </script>
@endpush
