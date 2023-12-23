@extends('layouts.appnav')

@section('content')
    @include('layouts.navbar')
    <section class="home-section mb-5">
        <div class="container mt-5 pt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header" id="calc-stunting">
                            <h1 class="card-title fs-3 fw-bold" id="examplecardLabel">Edit Data Posyandu</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dposyandus.update', $dposyandus->id) }}" method="POST"
                                enctype="multipart/form-dposyandus">
                                @csrf
                                @method('PUT') <!-- Use the PUT method for editing -->

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama_posyandu" name="nama_posyandu"
                                        placeholder="Masukkan Nama Posyandu" value="{{ $dposyandus->nama_posyandu }}"
                                        required>
                                    <label for="floatingInput" class="fw-bold">Nama Posyandu:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Lokasi Posyandu" id="lokasi_posyandu" name="lokasi_posyandu"
                                        style="height: 100px">{{ $dposyandus->lokasi_posyandu }}</textarea>
                                    <label for="floatingTextarea2" class="fw-bold">Lokasi Posyandu:</label>
                                </div>


                                {{-- Button --}}
                                <hr>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-3 col-3 d-grid">
                                        <a href="{{ route('dposyandus.index') }}" id="batal"
                                            class="btn btn-danger shadow" dposyandus-bs-dismiss="card">Batal</a>
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
    </section>
@endsection
