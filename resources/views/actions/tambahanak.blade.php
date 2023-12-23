<div class="modal-header">
    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Tambah Data Anak</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('danaks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Input Nama Anak -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('nama_anak') is-invalid @enderror"
                        id="nama_anak" name="nama_anak" placeholder="Masukkan Nama Anak" required
                        value="{{ old('nama_anak') }}">
                    <label for="nama_anak" class="fw-bold">Nama Anak:</label>
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

                <!-- Input Tempat Lahir -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('tempat_lahir') is-invalid @enderror"
                        id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required
                        value="{{ old('tempat_lahir') }}">
                    <label for="tempat_lahir" class="fw-bold">Tempat Lahir:</label>
                    @error('tempat_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Tanggal Lahir -->
                <div class="form mb-3">
                    <h6 class="fw-bold">Tanggal Lahir:</h6>
                    <input type="date"
                        class="form-control border border-dark-subtle @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_anak" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Select Posyandu -->
                <select class="form-select mb-3 border border-dark-subtle @error('t_posyandu') is-invalid @enderror"
                    aria-label="Default select example" name="t_posyandu" id="t_posyandu" required>
                    <option disabled value="" {{ old('t_posyandu') ? '' : 'selected' }}>Pilih Posyandu</option>
                    @foreach ($dposyandu->sortBy('nama_posyandu') as $data)
                        <option value="{{ $data->nama_posyandu }}"
                            {{ old('t_posyandu') === $data->nama_posyandu ? 'selected' : '' }}>
                            {{ $data->nama_posyandu }}
                        </option>
                    @endforeach
                </select>
                @error('t_posyandu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Informasi Tambahan -->
                <h5 class="fw-bold">Informasi Tambahan</h5>

                <!-- Input NIK Anak -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('nik_anak') is-invalid @enderror"
                        id="nik_anak" name="nik_anak" placeholder="Masukkan NIK" required maxlength="16"
                        value="{{ old('nik_anak') }}">
                    <label for="nik_anak" class="fw-bold">NIK:</label>
                    @error('nik_anak')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Nomor WA -->
                <div class="form-floating mb-3">
                    <input type="text"
                        class="form-control border border-dark-subtle @error('nowa') is-invalid @enderror"
                        id="nowa" name="nowa" placeholder="Masukkan Nomor HP" required maxlength="13"
                        value="{{ old('nowa') }}">
                    <label for="nowa" class="fw-bold">No WA:</label>
                    @error('nowa')
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
