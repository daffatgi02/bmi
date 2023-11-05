<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anak</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('danaks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control border border-dark-subtle" id="nama_anak" name="nama_anak"
                placeholder="Masukkan Nama Anak" required>
            <label for="floatingInput">Nama Anak:</label>
        </div>
        {{-- Select Jk --}}
        <select class="form-select mb-3 border border-dark-subtle" aria-label="Default select example" name="jk"
            id="jk" required>
            <option disabled value="" {{ old('jk') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
            <option value="L" {{ old('jk') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="P" {{ old('jk') === 'P' ? 'selected' : '' }}>Wanita</option>
        </select>

        <div class="form-floating mb-3">
            <input type="text" class="form-control border border-dark-subtle" id="tempat_lahir" name="tempat_lahir"
                placeholder="Masukkan Tempat Lahir" required>
            <label for="floatingInput">Tempat Lahir:</label>
        </div>

        <div class="form mb-3 ">
            <label for="tanggal_anak" class="mb-2"> Tanggal Lahir: </label>
            <input type="date" class="form-control border border-dark-subtle" id="tanggal_anak" name="tanggal_lahir"
                required>

        </div>
        <div class="row">
            <div class="col-8">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control border border-dark-subtle" id="umur" name="umur"
                        placeholder="Masukkan Umur" required>
                    <label for="floatingInput">Umur:</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-check">
                    <input class="form-check-input border border-dark-subtle" type="radio" name="flexRadioDefault"
                        id="c_bulan" required>
                    <label class="form-check-label" for="c_bulan">
                        Bulan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input border border-dark-subtle" type="radio" name="flexRadioDefault"
                        id="c_tahun" required>
                    <label class="form-check-label" for="c_tahun">
                        Tahun
                    </label>
                </div>
            </div>
        </div>

        {{-- Select Posyandu --}}
        <select class="form-select mb-3 border border-dark-subtle" aria-label="Default select example" name="t_posyandu"
            id="t_posyandu" required>
            <option disabled value="" {{ old('t_posyandu') ? '' : 'selected' }}>Pilih Posyandu</option>
            @foreach ($dposyandu->sortBy('nama_posyandu') as $data)
                <option value="{{ $data->nama_posyandu }}"
                    {{ old('t_posyandu') === $data->nama_posyandu ? 'selected' : '' }}>
                    {{ $data->nama_posyandu }}
                </option>
            @endforeach
        </select>


        {{-- Button --}}
        <hr>
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 col-3 d-grid">
                <button class="btn btn-success shadow">Simpan</button>
            </div>
            <div class="col-md-3 col-3 d-grid">
                <a id="batal" class="btn btn-danger shadow" data-bs-dismiss="modal">Batal</a>
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
