@extends('layouts.appnav')


@section('content')
    <div class="d-none d-md-block">
        @include('layouts.navbaradmin')
    </div>
    <section class="home-section mb-5">
        <div class="content">
            <div class="container mt-3 pt-3">
                <div class="d-flex mb-4">
                    <div class="d-flex">
                        <span class="fw-bold h1">Dashboard</span>
                    </div>
                    <div class="ms-auto d-block d-md-none">
                        <a id="batal" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
           document.getElementById('logout-form').submit();"
                            class="btn btn-keluar">
                            <div class="d-flex flex-row align-items-center">
                                <i class="bi bi-box-arrow-left me-0 me-md-2"></i>
                                <span class="d-none d-md-block">Keluar</span>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

                {{-- Content --}}
                <button type="button" class="btn btn-secondary"
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    data-bs-title="This top tooltip is themed via CSS variables.">
                    Custom tooltip
                </button>
            </div>
        </div>
    </section>
    <div class="d-block d-md-none">
        @include('layouts.bottombar')
    </div>
@endsection
