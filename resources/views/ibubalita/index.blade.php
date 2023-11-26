@extends('layouts.appbalita')

@section('content')
    <div class="container mt-2 mb-5">
        <div class="mb-4">
            <div class="d-flex mb-4">
                <i class="bi bi-book fs-4 me-2"></i>
                <h2>Daftar Antrian</h2>
            </div>
            <form action="{{ route('antrians.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Isi Data
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="n_antrian" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="n_antrian" name="n_antrian"
                                placeholder="Massukkan Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="n_antrian" class="form-label">Pilih Posyandy</label>
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
                            <div class="col-md-3 col-4 d-grid">
                                <a id="batal" href="/" class="btn btn-danger shadow">Kembali</a>
                            </div>
                            <div class="col-md-3 col-4 d-grid">
                                <button class="btn btn-success shadow">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="d-flex mt-5 mb-4">
            <i class="bi bi-list-ol fs-4 me-2"></i>
            <h2>Urutan Antrian</h2>
        </div>
        <div class="mt-4 px-1">
            <div class="mt-4 mb-4">
                <h6>Pilih Posyandu: </h6>
                @foreach ($dposyandu as $data)
                    <button class="badge text-bg-warning">
                        {{ $data->nama_posyandu }}
                    </button>
                @endforeach
            </div>
            <table id="tabel_antrian" class="display nowrap cell-border" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Urutan</th>
                        <th class="w-75">Nama</th>
                        <th>Posyandu</th>
                    </tr>
                </thead>
            </table>
        </div>

        <script>
            $(document).ready(function() {
                $('.badge.text-bg-warning').on('click', function() {
                    var posyanduValue = $(this).text().trim();
                    $('#tabel_antrian_filter input[type="search"]').val(posyanduValue).trigger('input');
                    dataTable.search(posyanduValue).draw(); // Memfilter dan memperbarui DataTable
                });
                var dataTable = new DataTable('#tabel_antrian', {
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: "gettabelantrian",
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
                        [0, "desc"]
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100, "All"],
                    ],

                    searching: true,
                    search: {
                        smart: false,
                        regex: true
                    },
                    language: {
                        search: "Cari:", // Mengganti teks "Search" menjadi "Cari"
                    },
                });
            });
        </script>
    </div>
@endsection
