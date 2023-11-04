@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header bg-info text-white">
                            <h3>Input Data</h3>
                        </div>

                        <div class="card-body">
                            <div class="d-flex ">
                                <i class="bi bi-search fs-3 me-2"></i>
                                <input type="text" id="searchInput" class="form-control mb-3 border border-dark-subtle" placeholder="Cari Nama">
                            </div>

                            <select class="form-select mb-3" size="7" id="namabb" name="namabb" required>
                                <option class="fw-bold fs-5 mb-3 text-center bg-dark-subtle rounded-2" value="null"
                                    disabled>
                                    Silahkan Pilih Nama
                                </option>
                                @foreach ($danaks->sortBy('nama_anak') as $data )
                                    <option class="border m-1" value="{{$data->nama_anak}}">
                                        - {{$data->nama_anak}}
                                    </option>
                                @endforeach

                            </select>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control border border-dark-subtle" id="floatingInput"
                                    placeholder="Masukan Berat Badan (KG)" required>
                                <label for="floatingInput">Berat Badan (KG)</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control border-dark-subtle" id="floatingInput"
                                    placeholder="Masukan Tinggi Badan (KG)" required>
                                <label for="floatingInput">Tinggi Badan (CM)</label>
                            </div>
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
            const namabbSelect = document.getElementById("namabb");

            // Simpan opsi "Silahkan Pilih Nama" ke dalam variabel
            const placeholderOption = namabbSelect.querySelector('option[value="null"]');

            // Membuat daftar semua opsi (kecuali opsi "Silahkan Pilih Nama")
            const options = Array.from(namabbSelect.options).filter(option => option.value !== "null");

            // Menambahkan event listener untuk input pencarian
            searchInput.addEventListener("input", function() {
                const searchText = searchInput.value.toLowerCase();
                const filteredOptions = options.filter(option => option.textContent.toLowerCase().includes(
                    searchText));

                // Mengosongkan dropdown
                namabbSelect.innerHTML = '';

                // Tambahkan kembali opsi "Silahkan Pilih Nama"
                namabbSelect.appendChild(placeholderOption);

                // Menampilkan opsi yang sesuai
                filteredOptions.forEach(option => {
                    namabbSelect.appendChild(option.cloneNode(true));
                });
            });
        });


        // Reset
        document.addEventListener("DOMContentLoaded", function() {
            // Temukan elemen tombol reset
            var resetButton = document.getElementById("reset");

            // Temukan semua elemen input dalam formulir yang ingin di-reset
            var inputElements = document.querySelectorAll('input[type="text"], input[type="number"]');

            // Temukan elemen select yang ingin di-reset
            var selectElement = document.getElementById("namabb");

            // Simpan indeks pilihan awal
            var initialSelectedIndex = selectElement.selectedIndex;

            // Tambahkan event listener untuk tombol reset
            resetButton.addEventListener("click", function() {
                // Loop melalui semua elemen input dan reset nilainya
                inputElements.forEach(function(input) {
                    input.value = "";
                });

                // Reset pilihan pada elemen select ke opsi pertama (indeks 0)
                selectElement.selectedIndex = initialSelectedIndex;
            });
        });
    </script>

    {{-- PESAN ERROR --}}
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection
