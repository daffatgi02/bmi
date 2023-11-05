@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('kaders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header bg-info text-white">
                            <h3>Input Data</h3>
                        </div>

                        <div class="card-body">
                            <div class="d-flex ">
                                <i class="bi bi-search fs-3 me-2"></i>
                                <input type="text" id="searchInput" class="form-control mb-3 border border-dark-subtle"
                                    placeholder="Cari Nama" onclick="selectAllText(this);" onfocus="selectAllText(this);">
                            </div>

                            <select class="form-select mb-3" size="7" id="danaks_id" name="danaks_id" required>
                                <option class="fw-bold fs-5 mb-3 text-center bg-dark-subtle rounded-2" value="null"
                                    disabled>
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
                                        <input type="number" class="form-control border border-dark-subtle" id="bb_anak"
                                            name="bb_anak" placeholder="Masukan Berat Badan (KG)" value="0" required
                                            onclick="selectAllText(this);" onfocus="selectAllText(this);">
                                        <label for="bb_anak">Berat Badan (KG)</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control border-dark-subtle" id="tb_anak"
                                            name="tb_anak" placeholder="Masukan Tinggi Badan (KG)" value="0" required
                                            onclick="selectAllText(this);" onfocus="selectAllText(this);">
                                        <label for="tb_anak">Tinggi Badan (CM)</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border-dark-subtle" id="st_anak"
                                            name="st_anak" placeholder="Status Anak" required readonly value="">
                                        <label for="st_anak">Status Aanak</label>
                                    </div>
                                </div>
                            </div>


                            {{-- Button --}}
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3 col-3 d-grid">
                                    <button class="btn btn-success">Submit</button>
                                </div>
                                <div class="col-md-3 col-3 d-grid">
                                    <a id="reset" class="btn btn-danger">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

                // Masukkan hasil perhitungan ke dalam input st_anak
                st_anakInput.value = st_anakValue;
            } else {
                // Jika salah satu nilai tidak valid, atur nilai st_anak ke 0
                st_anakInput.value = 0;
            }
        };

        // Select
        function selectAllText(input) {
            input.select();
        };
    </script>

    {{-- PESAN ERROR --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection
