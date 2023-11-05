<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Posyandu</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('dposyandus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control border border-dark-subtle" id="nama_posyandu" name="nama_posyandu" placeholder="Masukkan Nama Posyandu"
                required>
            <label for="floatingInput">Nama Posyandu:</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control border border-dark-subtle" id="lokasi_posyandu" name="lokasi_posyandu" placeholder="Masukkan Nama Posyandu"
                required>
            <label for="floatingInput">Lokasi Posyandu:</label>
        </div>



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
