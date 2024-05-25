<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Connect Pediatrics</title>

    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/Logo_Web.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- CSS DATATABLES --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">


    {{-- SCRIPT DATATABLES --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>

    <!-- Bootstrap JS (popper.js and bootstrap.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css', 'resources/js/auth.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h4 id="nav-title" class="shadow fw-bold">Connect Pediatrics</h4>
                </a>

                @guest
                    {{-- @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif --}}

                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">Registrasi</a>
                    @endif
                @else
                    <a class="btn btn-danger d-flex align-items-center" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-left me-0 me-sm-2 fs-5"></i>
                        <span class="d-sm-block d-none">Keluar</span>
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
    @include('sweetalert::alert')
</body>

</html>
