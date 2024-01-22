@extends('layouts.appbalita')

@section('content')
    <div class="container mt-2 mb-5">
        <div class="mb-4">
            <div class="d-flex mb-4">
                <i class="bi bi-book fs-4 me-2"></i>
                <h2 class="fw-bold">Daftar Antrian</h2>
                <div class="ms-auto">


                    <a id="batal" href="/" class="btn btn-danger shadow"> <i class="bi bi-arrow-left-square"></i>
                        Kembali</a>
                </div>
            </div>

            <form action="{{ route('antrians.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header" id="calc-stunting">
                        <span class="fs-5 fw-bold">Isi Data</span class="fs-5">
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="n_antrian" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="n_antrian" name="n_antrian"
                                placeholder="Massukkan Nama" required>
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
                    </div>
                    <div class="card-footer">
                        {{-- Button Submit --}}
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3 col-6 d-grid">
                                <button class="btn btn-logreg fw-bold shadow">Daftar Antrian</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="d-flex mt-5 mb-4">
            <i class="bi bi-list-ol fs-4 me-2"></i>
            <h2 class="fw-bold">Lihat Urutan Antrian</h2>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('antrians.index') }}" class="btn btn-logreg">
                <i class="bi bi-arrow-clockwise me-1 "></i>
                Muat Ulang
            </a>
        </div>
        <div class="mt-4 px-1">
            <div class="mt-4 mb-4">
                <h5>Silahkan Pilih Posyandu: </h5>
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
