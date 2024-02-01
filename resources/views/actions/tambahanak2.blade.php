<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Tambah Data Anak</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('storekader') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <h5 class="fw-bold">Informasi Anak</h5>

                <!-- Input NIK Anak -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('nik_anak') is-invalid @enderror"
                        id="nik_anak" name="nik_anak" placeholder="Masukkan NIK" required maxlength="16"
                        value="{{ old('nik_anak') }}">
                    <label for="nik_anak" class="">NIK Anak:</label>
                    @error('nik_anak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Input Nama Anak -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('nama_anak') is-invalid @enderror"
                        id="nama_anak" name="nama_anak" placeholder="Masukkan Nama Anak" required
                        value="{{ old('nama_anak') }}">
                    <label for="nama_anak" class="">Nama Anak:</label>
                    @error('nama_anak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Select Jenis Kelamin -->
                <select class="form-select mb-3 border border-dark-subtle @error('jk') is-invalid @enderror"
                    aria-label="Default select example" name="jk" id="jk" required>
                    <option disabled value="" {{ old('jk') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jk') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ old('jk') === 'P' ? 'selected' : '' }}>Wanita</option>
                </select>
                @error('jk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <!-- Input Tanggal Lahir -->
                <div class="form mb-3">
                    <h6 class="">Tanggal Lahir:</h6>
                    <input type="date"
                        class="form-control border border-dark-subtle @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_anak" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Select Posyandu -->
                <select class="form-select mb-3 border border-dark-subtle @error('dposyandu_id') is-invalid @enderror"
                    aria-label="Default select example" name="dposyandu_id" id="dposyandu_id" required>
                    <option disabled value="" {{ old('dposyandu_id') ? '' : 'selected' }}>Pilih Posyandu</option>
                    @foreach ($dposyandu->sortBy('nama_posyandu') as $data)
                        <option value="{{ $data->id }}" selected
                            {{ old('dposyandu_id') === $data->nama_posyandu ? 'selected' : '' }}>
                            {{ $data->nama_posyandu }}
                        </option>
                    @endforeach

                </select>
                @error('dposyandu_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <!-- Informasi Tambahan -->
                <h5 class="fw-bold">Informasi Orang Tua</h5>

                <!-- Input NIK Anak -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('nik_ortu') is-invalid @enderror"
                        id="nik_ortu" name="nik_ortu" placeholder="Masukkan NIK" required maxlength="16"
                        value="{{ old('nik_ortu') }}">
                    <label for="nik_ortu" class="">NIK Orang tua:</label>
                    @error('nik_ortu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Input Nama Ortu -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('nama_ortu') is-invalid @enderror"
                        id="nama_ortu" name="nama_ortu" placeholder="Masukkan Nama Ortu" required
                        value="{{ old('nama_ortu') }}">
                    <label for="nama_ortu" class="">Nama Orang Tua:</label>
                    @error('nama_ortu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Nomor WA -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('hp_ortu') is-invalid @enderror"
                        id="hp_ortu" name="hp_ortu" placeholder="Masukkan Nomor HP" required maxlength="13"
                        value="{{ old('hp_ortu') }}">
                    <label for="hp_ortu" class="">No WA:</label>
                    @error('hp_ortu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>




        <!-- Button -->
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 col-3 d-grid">
                <a id="batal" class="btn btn-danger shadow" data-bs-dismiss="modal">Batal</a>
            </div>
            <div class="col-md-3 col-3 d-grid">
                <button class="btn btn-success shadow">Simpan</button>
            </div>
        </div>
    </form>

</div>

{{-- Script --}}
<script>
    // Mendapatkan elemen-elemen yang diperlukan
    const radioBulan = document.getElementById("c_bulan");
    const radioTahun = document.getElementById("c_tahun");
    const inputUmur = document.getElementById("umur");

    // Mendengarkan perubahan pada radio button
    radioBulan.addEventListener("change", function() {
        if (radioBulan.checked) {
            // Jika radio "Bulan" dipilih, pastikan hanya satu spasi yang ada di antara angka umur dan kata "Bulan"
            inputUmur.value = inputUmur.value.replace(" Tahun", "").replace(" Bulan", "") + " Bulan";
        }
    });

    radioTahun.addEventListener("change", function() {
        if (radioTahun.checked) {
            // Jika radio "Tahun" dipilih, pastikan hanya satu spasi yang ada di antara angka umur dan kata "Tahun"
            inputUmur.value = inputUmur.value.replace(" Bulan", "").replace(" Tahun", "") + " Tahun";
        }
    });
</script>
