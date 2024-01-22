<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Tambah Antrian</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('antrians.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="n_antrian" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="n_antrian" name="n_antrian"
                        placeholder="Massukkan Nama" required>
                </div>
                <div class="mb-3">
                    <label for="n_antrian" class="form-label">Pilih Posyandu</label>
                    <select class="form-select mb-3 border border-dark-subtle" aria-label="Default select example"
                        name="t_posyandu" id="t_posyandu" required>
                        <option disabled value="" {{ old('t_posyandu') ? '' : 'selected' }}>Silahkan Pilih
                        </option>
                        @foreach ($dposyandu->sortBy('nama_posyandu') as $data)
                            <option value="{{ $data->nama_posyandu }}"
                                {{ old('t_posyandu') === $data->nama_posyandu ? 'selected' : '' }}>
                                {{ $data->nama_posyandu }}
                            </option>
                        @endforeach
                    </select>
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
