<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Anak</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('danaks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama_anak" name="nama_anak" placeholder="Masukkan Nama Anak"
                required>
            <label for="floatingInput">Nama Anak:</label>
        </div>
        {{-- Select Jk --}}
        <select class="form-select mb-3" aria-label="Default select example" name="jk" id="jk">
            <option disabled value="" {{ old('jk') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
            <option value="L" {{ old('jk') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="P" {{ old('jk') === 'P' ? 'selected' : '' }}>Wanita</option>
        </select>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                placeholder="Masukkan Tempat Lahir" required>
            <label for="floatingInput">Tempat Lahir:</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="tanggal_anak" name="tanggal_lahir" required>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur"
                required>
            <label for="floatingInput">Umur:</label>
        </div>

        {{-- Select Posyandu --}}
        <select class="form-select mb-3" aria-label="Default select example" name="t_posyandu" id="t_posyandu">
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
                <button class="btn btn-success">Submit</button>
            </div>
            <div class="col-md-3 col-3 d-grid">
                <a id="batal" class="btn btn-danger" data-bs-dismiss="modal">Batal</a>
            </div>
        </div>
    </form>
</div>
