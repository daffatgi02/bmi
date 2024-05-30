@extends('layouts.appbalita')

@section('content')
    <div class="container mt-4 mb-5 w-md-75 w-100">
        <div class="d-flex mb-4">
            <div class="d-flex">
                <i class="bi bi-list-ol fs-4 me-2"></i>
                <span class="fw-bold h2">Lihat Urutan Antrian</span>
            </div>
            <div class="ms-auto">
                <a id="batal" href="/" class="btn btn-keluar">
                    <div class="d-flex flex-row">
                        <i class="bi bi-box-arrow-left me-0 me-md-2"></i>
                        <span class="d-none d-md-block">
                            Kembali
                        </span>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-5 mb-4">
                <form action="{{ route('antrians.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card p-4 rounded-4 shadow">
                        <span class="h3 fw-bold mb-4">Daftar Antrian</span>
                        <div class="mb-3">
                            <label for="n_antrian" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="n_antrian" name="n_antrian"
                                placeholder="Masukkan Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="n_antrian" class="form-label">Pilih Posyandu</label>
                            <select class="form-select mb-3 border border-dark-subtle" aria-label="Default select example"
                                name="t_posyandu" id="t_posyandu" required>
                                <option disabled value="" {{ old('t_posyandu') ? '' : 'selected' }}>Silahkan Pilih
                                </option>
                                @foreach ($dposyandu->sortBy('nama_posyandu') as $data)
                                    <option value="{{ $data->nama_posyandu }}"
                                        {{ old('t_posyandu') === $data->nama_posyandu ? 'selected' : '' }}>
                                        {{ $data->nama_posyandu }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Button Submit --}}
                        <div class="text-center">
                            <button class="btn btn-logreg fw-bold shadow">
                                <i class="bi bi-person-lines-fill"></i> Daftar Antrian
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-7">
                <div class="mt-4 px-1">
                    <div class="mt-4 mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <span class="h4 ">Silahkan Pilih Posyandu: </span>
                            <div class="ms-auto">
                                <a href="{{ route('antrians.index') }}" class="btn btn-logreg">
                                    <div class="d-flex flex-row">
                                        <i class="bi bi-arrow-clockwise me-0 me-md-2 "></i>
                                        <span class="d-none d-md-block">
                                            Muat Ulang
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @foreach ($dposyandu as $data)
                            <button class="badge ku m-1" onclick="tampilkanTabel(this)">
                                {{ $data->nama_posyandu }}
                            </button>
                        @endforeach
                    </div>
                    <table id="tabel_antrian" class="table table-bordered shadow" style="width:100%; display: none;">
                        <thead class="table-warning">
                            <tr>
                                <th>id</th>
                                <th id="th">Urutan</th>
                                <th id="th" class="w-50">Nama</th>
                                <th id="th" class="w-30">Posyandu</th>
                                {{-- <th id="th">Waktu Daftar</th> --}}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <script>
            // Fungsi untuk reload setiap 10 detik
            // Memanggil fungsi saat halaman dimuat
            window.onload = function() {
                reloadEvery5Seconds();
            };
            // Tabel Antrian
            function tampilkanTabel(button) {
                var badges = document.querySelectorAll('.badge.ku');

                // Remove 'active' class from all badges
                badges.forEach(function(badge) {
                    badge.classList.remove('active');
                });

                // Add 'active' class to the clicked badge
                button.classList.add('active');

                // Display the table
                var tabel = document.getElementById("tabel_antrian");
                tabel.style.display = "table";
            }
            $(document).ready(function() {
                $('.badge').on('click', function() {
                    var posyanduValue = $(this).text().trim();
                    $('#tabel_antrian_filter input[type="search"]').val(posyanduValue).trigger('input');
                    dataTable.search(posyanduValue).draw(); // Memfilter dan memperbarui DataTable
                });
                var dataTable = new DataTable('#tabel_antrian', {
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    lengthChange: false,
                    ajax: "gettabelantrian",
                    pagingType: 'simple',
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
                            data: "n_antrian",
                            name: "n_antrian",
                            className: 'align-middle',
                            searchable: false,
                            orderable: false,


                        },
                        {
                            data: "t_posyandu",
                            name: "t_posyandu",
                            className: 'align-middle',

                        },
                    ],
                    order: [
                        [3, "desc"]
                    ],
                    lengthMenu: [
                        [-1],
                        ["All"],
                    ],

                    searching: true,
                    search: {
                        smart: false,
                        regex: true
                    },
                    language: {
                        search: "", // Mengganti teks "Search" menjadi "Cari"
                    },
                });
                $('#tabel_antrian_filter input[type="search"]').prop('disabled', true);
            });
        </script>
    </div>
@endsection
