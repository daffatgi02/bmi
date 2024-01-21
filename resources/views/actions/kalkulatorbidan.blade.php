<form action="{{ route('dbulanans.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card shadow">
        <div class="card-header" id="calc-stunting">
            <h3 class="fw-bold">Input Data</h3>
        </div>

        <div class="card-body">
            <div class="d-flex ">
                <i class="bi bi-search fs-3 me-2"></i>
                <input type="text" id="searchInput" class="form-control mb-3 border border-dark-subtle"
                    placeholder="Cari Nama" onclick="selectAllText(this);" onfocus="selectAllText(this);" required>
            </div>
            <div class="row">
                <div class="col-12">
                    <select class="form-select mb-2 border border-dark-subtle" id="danaks_id" name="danaks_id" required
                        style="cursor: pointer">
                        <option class="fw-bold fs-5 mb-3 text-center bg-dark-subtle rounded-2" value="null">
                            Silahkan Pilih Nama
                        </option>

                        @foreach ($danaks->sortBy('nama_anak') as $data)
                            @php
                                $tanggal_lahir = new DateTime($data->tanggal_lahir);
                                $sekarang = new DateTime();
                                $umur = $tanggal_lahir->diff($sekarang);

                                $umurTotal = $umur->y;
                                $umurTotal2 = $umur->m;
                                $umurTotal3 = $umur->y . ' Tahun ' . $umur->m . ' Bulan';
                            @endphp
                            <option class="border border-dark-subtle mb-2 px-2 overflow-auto overflow-md-hidden"
                                value="{{ $data->id }}" {{-- untuk rumus stunting --}} data-jk="{{ $data->jk }}"
                                data-nama_posyandu="{{ $data->dposyandu->nama_posyandu }}"
                                data-umur="{{ $umurTotal }}" data-umur2="{{ $umurTotal2 }}"
                                data-umur3="{{ $umurTotal3 }}"> <!-- Menambahkan data-umur -->
                                {{ $data->nama_anak }} | {{ $data->nik_anak }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                {{-- Cara Ukur --}}
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <form>
                        <div class="form-check form-check-inline">
                            <button class="btn border border-dark" type="button" id="berdiriButton"
                                value="Berdiri">Berdiri</button>
                        </div>
                        <div class="form-check form-check-inline">
                            <button class="btn border border-dark" type="button" id="telentangButton"
                                value="Telentang">Telentang</button>
                        </div>
                    </form>
                </div>
                <input type="text" id="jk_anak" name="jk_anak" class="d-none" required placeholder="jk_anak">

                <div class="row mb-3 mt-2 px-3 ">
                    <div class="col-6 text-center">
                        <label for="" class="border-bottom border-3">Umur Tahun</label><br>
                        <span class="badge rounded-pill text-bg-success fs-5 mt-2" id="umur_tahun_badge">
                            0
                        </span>
                    </div>
                    <div class="col-6 text-center">
                        <label for="" class="border-bottom border-3">Umur Bulan</label><br>
                        <span class="badge rounded-pill text-bg-success fs-5 mt-2" id="umur_bulan_badge">
                            0
                        </span>
                    </div>
                </div>

                <input type="text" id="umur_tahun" name="umur_tahun" class="d-none " placeholder="umur_tahun"
                    required>
                <input type="text" id="umur_bulan" name="umur_bulan" class="d-none " placeholder="umur_bulan"
                    required>
                <input type="text" id="umur_periksa" name="umur_periksa" class="d-none" required
                    placeholder="umur_periksa">
                <input type="text" id="nama_posyandu" name='nama_posyandu' class="d-none" required
                    placeholder="nama_posyandu">
                <input type="text" id="c_ukur" name='c_ukur' class="d-none" required placeholder="c_ukur">
                <input type="text" id="h_imt" name='h_imt' class="d-none" required placeholder="h_imt">

                {{-- Cara Ukur --}}
                <div class="col-6">
                    {{-- Untuk Umur Periksa --}}

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-dark-subtle  " id="bb_anak"
                            name="bb_anak" placeholder="Masukan Berat Badan (KG)" value="0" required
                            onclick="selectAllText(this);" onfocus="selectAllText(this);">
                        <label class="d-md-block d-none" for="bb_anak">Berat Badan (KG)</label>
                        <label class="d-md-none d-block" for="bb_anak">Berat Badan</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-dark-subtle " id="tb_anak"
                            name="tb_anak" placeholder="Masukan Tinggi Badan (KG)" value="0" required
                            onclick="selectAllText(this);" onfocus="selectAllText(this);">
                        <label class="d-md-block d-none" for="tb_anak">Tinggi Badan (CM)</label>
                        <label class="d-md-none d-block" for="tb_anak">Tinggi Badan</label>
                    </div>
                </div>
                {{-- LIla --}}
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-dark-subtle  " id="lk_anak"
                            name="lk_anak" placeholder="Masukan Lingkar Kepala (CM)" value="0" required
                            onclick="selectAllText(this);" onfocus="selectAllText(this);">
                        <label class="d-md-block d-none" for="lk_anak">Lingkar Kepala
                            (CM)</label>
                        <label class="d-md-none d-block" for="lk_anak">Lingkar Kepala</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border border-dark-subtle " id="ll_anak"
                            name="ll_anak" placeholder="Masukan Lingkar Lengan (CM)" value="0" required
                            onclick="selectAllText(this);" onfocus="selectAllText(this);">
                        <label class="d-md-block d-none" for="ll_anak">Lingkar Lengan
                            (CM)</label>
                        <label class="d-md-none d-block" for="ll_anak">Lingkar Lengan</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control border-dark-subtle" id="st_anak" name="st_anak"
                            placeholder="Status Anak" required readonly value="- Silahkan Masukan Data">
                        <label for="st_anak">Status Aanak</label>
                    </div>
                </div>
            </div>

            {{-- Button --}}
            <div class="row d-flex justify-content-center">
                <div class="col-md-3 col-4 d-grid">
                    <a id="reset" class="btn btn-danger shadow">Reset</a>
                </div>
                <div class="col-md-3 col-4 d-grid">
                    <button class="btn btn-success" id="liveToastBtn">Submit</button>
                </div>
            </div>
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-warning">
                        <strong class="me-auto">Info</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body bg-white">
                        Silahkan Pilih Cara Ukur Terlebih Dahulu
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Bootstrap JS (popper.js and bootstrap.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
