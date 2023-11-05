@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="content">
            <h1 class="m-3">Halaman Data Bulanan</h1>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('dbulanans.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card shadow">
                                <div class="card-header bg-info text-white">
                                    <h3>Input Data</h3>
                                </div>

                                <div class="card-body">
                                    <div class="d-flex ">
                                        <i class="bi bi-search fs-3 me-2"></i>
                                        <input type="text" id="searchInput"
                                            class="form-control mb-3 border border-dark-subtle" placeholder="Cari Nama"
                                            onclick="selectAllText(this);" onfocus="selectAllText(this);">
                                    </div>

                                    <select class="form-select mb-3" size="7" id="danaks_id" name="danaks_id"
                                        required>
                                        <option class="fw-bold fs-5 mb-3 text-center bg-dark-subtle rounded-2"
                                            value="null" disabled>
                                            Silahkan Pilih Nama
                                        </option>

                                        @foreach ($danaks->sortBy('nama_anak') as $data)
                                            <option class="border border-dark-subtle mb-2 ps-2" value="{{ $data->id }}">
                                                - {{ $data->nama_anak }}
                                            </option>
                                        @endforeach

                                    </select>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control border border-dark-subtle"
                                                    id="bb_anak" name="bb_anak" placeholder="Masukan Berat Badan (KG)"
                                                    value="0" required onclick="selectAllText(this);"
                                                    onfocus="selectAllText(this);">
                                                <label class="d-md-block d-none" for="bb_anak">Berat Badan (KG)</label>
                                                <label class="d-md-none d-block" for="bb_anak">Berat Badan</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control border-dark-subtle" id="tb_anak"
                                                    name="tb_anak" placeholder="Masukan Tinggi Badan (KG)" value="0"
                                                    required onclick="selectAllText(this);" onfocus="selectAllText(this);">
                                                <label class="d-md-block d-none" for="tb_anak">Tinggi Badan (CM)</label>
                                                <label class="d-md-none d-block" for="tb_anak">Tinggi Badan</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control border-dark-subtle" id="st_anak"
                                                    name="st_anak" placeholder="Status Anak" required readonly
                                                    value="-">
                                                <label for="st_anak">Status Aanak</label>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- Button --}}
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-3 col-4 d-grid">
                                            <button class="btn btn-success shadow">Submit</button>
                                        </div>
                                        <div class="col-md-3 col-4 d-grid">
                                            <a id="reset" class="btn btn-danger shadow">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="table-responsive border border-dark-subtle p-4 shadow rounded-3">
                            <table class="table table-striped table-bordered border datatable" id="tabelbulanan">
                                <thead class="fw-bold table-info ">
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Umur</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tanggal Priksa</th>
                                        <th class="text-center">Posyandu</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Script --}}
            <script>
                // Search
                document.addEventListener("DOMContentLoaded", function() {
                    const searchInput = document.getElementById("searchInput");
                    const danaksSelect = document.getElementById("danaks_id");

                    // Simpan opsi "Silahkan Pilih Nama" ke dalam variabel
                    const placeholderOption = danaksSelect.querySelector('option[value="null"]');

                    // Membuat daftar semua opsi (kecuali opsi "Silahkan Pilih Nama")
                    const options = Array.from(danaksSelect.options).filter(option => option.value !== "null");

                    // Menambahkan event listener untuk input pencarian
                    searchInput.addEventListener("input", function() {
                        const searchText = searchInput.value.toLowerCase();
                        const filteredOptions = options.filter(option => option.textContent.toLowerCase().includes(
                            searchText));

                        // Mengosongkan dropdown
                        danaksSelect.innerHTML = '';

                        // Tambahkan kembali opsi "Silahkan Pilih Nama"
                        danaksSelect.appendChild(placeholderOption);

                        // Menampilkan opsi yang sesuai
                        filteredOptions.forEach(option => {
                            danaksSelect.appendChild(option.cloneNode(true));
                        });
                    });
                });

                // Reset
                document.addEventListener("DOMContentLoaded", function() {
                    // Temukan elemen tombol reset
                    let resetButton = document.getElementById("reset");

                    // Temukan semua elemen input dalam formulir yang ingin di-reset, except for the search input
                    let inputElements = document.querySelectorAll('input[type="text"], input[type="number"]');
                    // Exclude the search input from the list of input elements
                    let searchInput = document.getElementById("searchInput");

                    // Temukan elemen select yang ingin di-reset
                    let danaksSelect = document.getElementById("danaks_id");

                    // Simpan indeks pilihan awal
                    let initialSelectedIndex = danaksSelect.selectedIndex;

                    // Tambahkan event listener untuk tombol reset
                    resetButton.addEventListener("click", function() {
                        // Loop melalalui semua elemen input kecuali search input dan reset nilainya
                        inputElements.forEach(function(input) {
                            if (input !== searchInput) {
                                if (input.type === "text") {
                                    input.value = "-";
                                } else if (input.type === "number") {
                                    input.value = 0;
                                }
                            }
                        });

                        // Reset pilihan pada elemen select ke opsi pertama (indeks 0)
                        danaksSelect.selectedIndex = initialSelectedIndex;
                    });
                });

                // Stautus
                // Ambil elemen input bb_anak, tb_anak, dan st_anak
                let bb_anakInput = document.getElementById('bb_anak');
                let tb_anakInput = document.getElementById('tb_anak');
                let st_anakInput = document.getElementById('st_anak');

                // Tambahkan event listener untuk input bb_anak
                bb_anakInput.addEventListener('input', updateStatusAnak);

                // Tambahkan event listener untuk input tb_anak
                tb_anakInput.addEventListener('input', updateStatusAnak);

                // Fungsi untuk mengupdate nilai st_anak
                function updateStatusAnak() {
                    // Ambil nilai dari bb_anak dan tb_anak
                    let bb_anakValue = parseFloat(bb_anakInput.value);
                    let tb_anakValue = parseFloat(tb_anakInput.value);

                    // Periksa apakah kedua nilai adalah angka yang valid
                    if (!isNaN(bb_anakValue) && !isNaN(tb_anakValue)) {
                        // Hitung hasil dari bb_anak + tb_anak
                        let st_anakValue = bb_anakValue + tb_anakValue;

                        // Periksa total st_anakValue
                        if (st_anakValue <= 10) {
                            // Jika total <= 10, atur nilai st_anakInput menjadi "Stunting"
                            st_anakInput.value = "Stunting";
                        } else {
                            // Jika total > 10, atur nilai st_anakInput menjadi "Tidak Stunting"
                            st_anakInput.value = "Tidak Stunting";
                        }
                    } else {
                        // Jika salah satu nilai tidak valid, atur nilai st_anak ke 0
                        st_anakInput.value = 0;
                    }
                }


                // Select
                function selectAllText(input) {
                    input.select();
                };
            </script>
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
            $('#tabelbulanan').DataTable({
                serverSide: true,
                processing: true,
                ajax: "gettabelbulanan",
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
                        className: 'text-center align-middle',
                        render: function(data, type, row, meta) {
                            return data + '.';
                        }
                    },
                    {
                        data: "danaks.nama_anak",
                        name: "danaks.nama_anak",
                        className: 'align-middle',

                    },
                    {
                        data: "danaks.jk",
                        name: "danaks.jk",
                        className: 'text-center align-middle',
                        width: "5%",
                    },
                    {
                        data: "danaks.umur",
                        name: "danaks.umur",
                        className: 'text-center align-middle',
                        width: "10%",
                        render: function(data, type, row, meta) {
                            return data + ' Tahun';
                        }
                    },
                    {
                        data: "st_anak",
                        name: "st_anak",
                        className: 'text-center align-middle',
                        width: "15%",
                    },
                    {
                        data: "created_at",
                        name: "created_at",
                        className: 'text-center align-middle',
                        width: "15%",
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
                        data: "danaks.t_posyandu",
                        name: "danaks.t_posyandu",
                        className: 'align-middle',
                        width: "25%",
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
