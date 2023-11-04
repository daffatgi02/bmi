@extends('layouts.appnav')

@section('content')
    <div class="container mt-4 pt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title fs-3" id="examplecardLabel">Edit Data Anak</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('danaks.update', $danaks->id) }}" method="POST" enctype="multipart/form-danaks">
                            @csrf
                            @method('PUT') <!-- Use the PUT method for editing -->

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_anak" name="nama_anak"
                                    placeholder="Masukkan Nama Anak" value="{{ $danaks->nama_anak }}" required>
                                <label for="floatingInput">Nama Anak:</label>
                            </div>

                            {{-- Select Jk --}}
                            <select class="form-select mb-3" aria-label="Default select example" name="jk" id="jk">
                                <option disabled value="" {{ old('jk', $danaks->jk) ? '' : 'selected' }}>Pilih Jenis Kelamin
                                </option>
                                <option value="L" {{ old('jk', $danaks->jk) === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('jk', $danaks->jk) === 'P' ? 'selected' : '' }}>Wanita</option>
                            </select>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    placeholder="Masukkan Tempat Lahir" value="{{ $danaks->tempat_lahir }}" required>
                                <label for= "floatingInput">Tempat Lahir:</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_anak" name="tanggal_lahir"
                                    value="{{ $danaks->tanggal_lahir }}" required>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukkan Umur"
                                    value="{{ $danaks->umur }}" required>
                                <label for="floatingInput">Umur:</label>
                            </div>

                            {{-- Select Posyandu --}}
                            <select class="form-select mb-3" aria-label="Default select example" name="t_posyandu" id="t_posyandu">
                                <option disabled value="" {{ old('t_posyandu', $danaks->t_posyandu) ? '' : 'selected' }}>Pilih
                                    Posyandu</option>
                                @foreach ($dposyandu->sortBy('nama_posyandu') as $posyandu)
                                    <option value="{{ $posyandu->nama_posyandu }}"
                                        {{ old('t_posyandu', $danaks->t_posyandu) === $posyandu->nama_posyandu ? 'selected' : '' }}>
                                        {{ $posyandu->nama_posyandu }}
                                    </option>
                                @endforeach
                            </select>

                            {{-- Button --}}
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3 col-3 d-grid">
                                    <button class="btn btn-success">Edit</button>
                                </div>
                                <div class="col-md-3 col-3 d-grid">
                                    <a href="{{route('danaks.index')}}" id="batal" class="btn btn-danger" danaks-bs-dismiss="card">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
