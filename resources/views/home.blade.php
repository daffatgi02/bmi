@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-md-5 mt-5 pt-md-0 pt-5">
                <h1>Akun Sudah Teregistrasi</h1>
                <div class="card">
                    <div class="card-header">Innformasi</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Akun <b>{{ Auth::user()->name }}</b> sudah Teregistrasi sebagai!
                        <br>
                        <a class="btn btn-primary mt-5" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Masuk
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
