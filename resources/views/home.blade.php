@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-md-5 mt-5 pt-md-0 pt-5">
                <h1>Akun Sudah Terdaftar</h1>
                <div class="card">
                    <div class="card-header fw-bold" id="calc-stunting">Informasi</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Akun <b>{{ Auth::user()->name }}</b> sudah Terdaftar sebagai <b>{{ Auth::user()->level }}</b> dengan
                        Status akun
                        @if (Auth::user()->status === 'Aktif')
                            <b class="text-success">{{ Auth::user()->status }}</b>!
                        @else
                            <b class="text-danger">{{ Auth::user()->status }}</b>!
                        @endif
                        <br>
                        <a class="btn btn-logreg fw-bold mt-5" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Keluar
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
