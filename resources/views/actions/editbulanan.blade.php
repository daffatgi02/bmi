@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="container mt-3 pt-3">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="card shadow">
                        <div class="card-header" id="calc-stunting">
                            <h1 class="card-title fs-3 fw-bold" id="examplecardLabel">Edit Data Bulanan Anak</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dbulanans.update', $dbulanans->id) }}" method="POST"
                                enctype="multipart/form-dbulanans">
                                @csrf
                                @method('PUT') <!-- Use the PUT method for editing -->

                                <h3 class="mb-4 text-center">{{ $dbulanans->danaks->nama_anak }}</h3>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-0z " id="umur_periksa" name="umur_periksa"
                                        placeholder="Masukkan Umur" value="{{ $dbulanans->umur_periksa }}" required
                                        readonly>
                                    <label for="floatingInput" class="fw-bold">Umur:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control border border-0z   " id="bb_anak_input" name="bb_anak"
                                        placeholder="Masukkan Berat Badan (KG)" value="{{ $dbulanans->bb_anak }}"
                                        required>
                                    <label for="bb_anak_input" class="fw-bold">Berat Badan (KG):</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control border border-0z   " id="tb_anak_input" name="tb_anak"
                                        placeholder="Masukkan Tinggi Badan (CM)" value="{{ $dbulanans->tb_anak }}"
                                        required>
                                    <label for="tb_anak_input" class="fw-bold">Tinggi Badan (CM):</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-0z " id="lk_anak" name="lk_anak"
                                        placeholder="Masukkan Lingkar Kepala (CM)" value="{{ $dbulanans->lk_anak }}"
                                        required>
                                    <label for="floatingInput" class="fw-bold">Lingkar Kepala (CM):</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-0z " id="ll_anak" name="ll_anak"
                                        placeholder="Masukkan Lingkar Lengan (CM)" value="{{ $dbulanans->ll_anak }}"
                                        required>
                                    <label for="floatingInput" class="fw-bold">Lingkar Lengan (CM):</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control border border-0z " id="st_anak" name="st_anak"
                                        placeholder="Status Anak" value="{{ $dbulanans->st_anak }}" required
                                        readonly>
                                    <label for="st_anak" class="fw-bold">Status Anak:</label>
                                </div>

                                {{-- d-none --}}
                                <div class="d-none">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control d-none" id="danaks_id"
                                            name="danaks_id" placeholder="Masukkan Nama Anak"
                                            value="{{ $dbulanans->danaks->id }}" required>
                                        <label for="floatingInput" class="fw-bold">Nama Anak:</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="created_at" name="created_at"
                                            placeholder="Masukkan created" value="{{ $dbulanans->created_at }}"
                                            required>
                                        <label for="floatingInput" class="fw-bold">created:</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control border border-0z " id="updated_at" name="updated_at"
                                            placeholder="Masukkan updated" value="{{ $dbulanans->updated_at }}"
                                            required>
                                        <label for="floatingInput" class="fw-bold">updated:</label>
                                    </div>
                                </div>

                                <hr>
                                <div class="row d-flex justify-content-center pb-4">
                                    <div class="col-md-4 col-4 d-grid">
                                        <a href="{{ route('dbulanans.index') }}" id="batal"
                                            class="btn btn-danger shadow" dposyandus-bs-dismiss="card">Batal</a>
                                    </div>
                                    <div class="col-md-4 col-3 d-grid">
                                        <button class="btn btn-success shadow">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Stautus
            let bb_anakInput = document.getElementById('bb_anak_input');
            let tb_anakInput = document.getElementById('tb_anak_input');
            let st_anakInput = document.getElementById('st_anak');

            bb_anakInput.addEventListener('input', updateStatusAnak);
            tb_anakInput.addEventListener('input', updateStatusAnak);

            function updateStatusAnak() {
                let bb_anakValue = parseFloat(bb_anakInput.value);
                let tb_anakValue = parseFloat(tb_anakInput.value);

                if (!isNaN(bb_anakValue) && !isNaN(tb_anakValue)) {
                    let st_anakValue = bb_anakValue + tb_anakValue;

                    // Implement the logic here based on your requirements
                    // Example logic (please modify based on your requirements):
                    if (st_anakValue <= 10) {
                        st_anakInput.value = "Gizi Buruk";
                    } else {
                        st_anakInput.value = "Gizi Baik";
                    }
                } else {
                    st_anakInput.value = '- Inputan Tidak Valid';
                }
            }
        </script>
    </section>
@endsection
