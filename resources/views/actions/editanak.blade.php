@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="container mt-2 pt-4">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header" id="calc-stunting">
                            <h1 class="card-title fs-3" id="examplecardLabel">Informasi Data Anak</h1>
                        </div>
                        <form action="{{ route('danaks.update', $danaks->id) }}" method="POST"
                            enctype="multipart/form-danaks">
                            @csrf
                            @method('PUT') <!-- Use the PUT method for editing -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6">

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nama_anak" name="nama_anak"
                                                placeholder="Masukkan Nama Anak" value="{{ $danaks->nama_anak }}" required>
                                            <label for="floatingInput">Nama Anak:</label>
                                        </div>

                                        {{-- Select Jk --}}
                                        <label for="jk" class="mb-2 fw-bold">Jenis Kelamin:</label>

                                        <select class="form-select mb-3" aria-label="Default select example" name="jk"
                                            id="jk">
                                            <option disabled value="" {{ old('jk', $danaks->jk) ? '' : 'selected' }}>
                                                Pilih
                                                Jenis Kelamin
                                            </option>
                                            <option value="L" {{ old('jk', $danaks->jk) === 'L' ? 'selected' : '' }}>
                                                Laki-Laki
                                            </option>
                                            <option value="P" {{ old('jk', $danaks->jk) === 'P' ? 'selected' : '' }}>
                                                Wanita
                                            </option>
                                        </select>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                                placeholder="Masukkan Tempat Lahir" value="{{ $danaks->tempat_lahir }}"
                                                required>
                                            <label for= "floatingInput">Tempat Lahir:</label>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tanggal_anak" class="mb-2 fw-bold">Tanggal Lahir:</label>
                                            <input type="date" class="form-control" id="tanggal_anak"
                                                name="tanggal_lahir" value="{{ $danaks->tanggal_lahir }}" required>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="umur" name="umur"
                                                placeholder="Masukkan Umur" value="{{ $danaks->umur }}" required readonly>
                                            <label for="floatingInput">Umur:</label>
                                        </div>

                                        {{-- Select Posyandu --}}
                                        <label for="floatingInput" class="fw-bold">Nama Posyandu:</label>
                                        <select class="form-select mb-3" aria-label="Default select example"
                                            name="t_posyandu" id="t_posyandu">
                                            <option disabled value=""
                                                {{ old('t_posyandu', $danaks->t_posyandu) ? '' : 'selected' }}>Pilih
                                                Posyandu</option>
                                            @foreach ($dposyandu->sortBy('nama_posyandu') as $posyandu)
                                                <option value="{{ $posyandu->nama_posyandu }}"
                                                    {{ old('t_posyandu', $danaks->t_posyandu) === $posyandu->nama_posyandu ? 'selected' : '' }}>
                                                    {{ $posyandu->nama_posyandu }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <hr class="d-lg-none d-block">
                                    <div class="col-12 col-lg-6">
                                        <h5>Informasi Tambahan</h5>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="nik_anak" name="nik_anak"
                                                placeholder="Masukkan NIK" value="{{ $danaks->nik_anak }}" required
                                                maxlength="16">
                                            <label for="floatingInput">NIK:</label>
                                            <div class="form-floating mt-3">
                                                <input type="text" class="form-control" id="nowa" name="nowa"
                                                    placeholder="Masukkan No WA" value="{{ $danaks->nowa }}" required
                                                    maxlength="13">
                                                <label for="floatingInput">No WA:</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Button --}}
                            <div class="card-footer">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-3 col-3 d-grid">
                                        <a href="{{ route('danaks.index') }}" id="batal" class="btn btn-danger shadow"
                                            danaks-bs-dismiss="card">Batal</a>
                                    </div>
                                    <div class="col-md-3 col-3 d-grid">
                                        <button class="btn btn-success shadow">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Mendapatkan elemen input dengan id 'umur'
        var umurInput = document.getElementById('umur');

        // Tanggal lahir dari PHP, Anda bisa memasukkan nilai ini dari backend Anda
        var tanggalLahir = '{{ $danaks->tanggal_lahir }}';

        // Konversi tanggal lahir ke objek Date
        var dob = new Date(tanggalLahir);
        var today = new Date();

        // Hitung umur berdasarkan perbedaan tahun
        var diff = today - dob;
        var ageDate = new Date(diff);
        var umurTahun = ageDate.getUTCFullYear() - 1970;
        var umurBulan = ageDate.getUTCMonth();
        var umurHari = ageDate.getUTCDate() - 1;

        var umurTotal = '';

        // Terapkan aturan perhitungan umur
        if (umurTahun < 1) {
            if (umurBulan < 1) {
                umurTotal = "±" + umurHari + " hari";
            } else {
                umurTotal = umurBulan + " bulan";
            }
        } else {
            umurTotal = umurTahun + " tahun";
        }

        // Set nilai umur pada elemen input
        umurInput.value = umurTotal; // Sesuaikan dengan format yang diinginkan
    </script>
@endsection
