@extends('layouts.appnav')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title fs-3" id="examplecardLabel">Edit Data Posyandu</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dposyandus.update', $dposyandus->id) }}" method="POST" enctype="multipart/form-dposyandus">
                            @csrf
                            @method('PUT') <!-- Use the PUT method for editing -->

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_posyandu" name="nama_posyandu"
                                    placeholder="Masukkan Nama Posyandu" value="{{ $dposyandus->nama_posyandu }}" required>
                                <label for="floatingInput">Nama Posyandu:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lokasi_posyandu" name="lokasi_posyandu"
                                    placeholder="Masukkan Lokasi posyandu" value="{{ $dposyandus->lokasi_posyandu }}" required>
                                <label for="floatingInput">Lokasi Posyandu:</label>
                            </div>


                            {{-- Button --}}
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3 col-3 d-grid">
                                    <a href="{{route('dposyandus.index')}}" id="batal" class="btn btn-danger shadow" dposyandus-bs-dismiss="card">Batal</a>
                                </div>
                                <div class="col-md-3 col-3 d-grid">
                                    <button class="btn btn-success shadow">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
