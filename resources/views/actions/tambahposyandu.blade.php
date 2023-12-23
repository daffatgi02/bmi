<div class="modal-header">
    <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Tambah Data Posyandu</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('dposyandus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control border border-dark-subtle" id="nama_posyandu" name="nama_posyandu"
                placeholder="Masukkan Nama Posyandu" required>
            <label for="floatingInput" class="fw-bold">Nama Posyandu:</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Lokasi Posyandu" id="lokasi_posyandu" name="lokasi_posyandu" style="height: 100px"></textarea>
            <label for="floatingTextarea2" class="fw-bold">Lokasi Posyandu:</label>
        </div>



        {{-- Button --}}
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
