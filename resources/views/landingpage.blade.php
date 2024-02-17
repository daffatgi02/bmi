<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ConnectPediatrics</title>

    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/Logo_Web.ico') }}" type="image/x-icon">

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/nav.css', 'resources/js/nav.js'])
    <style>
        body {
            height: 100vh;
            display: flex;
            background-color: #F2FFFA;
            align-items: center
        }

        .view1 {
            background-color: #3BDD9B;
            height: 20rem;
            align-items: center;
            justify-content: center;
        }

        .view2 {
            background-color: #3E6B58;
            height: 20rem;
            align-items: center;
            justify-content: center;
        }

        .card-header {
            background-color: #3BDD9B;
        }

        .btn {
            color: #fff;
            background-color: #19573e;
            font-weight: bold
        }

        .btn:hover {
            background-color: #33b581;
            color: #0d3122;
            font-weight: bold
        }
    </style>


</head>

<body>
    <div class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-border text-success" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <label>Loading</label>
        </div>
    </div>

    {{-- PC --}}
    <div class="container-fluid d-none d-lg-block">
        <div class="row d-flex justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card card_w hstack border-0 shadow-lg">
                    <div class="view1 w-100 rounded-start vstack p-3">
                        <img class="mx-auto d-block" src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}"
                            alt="logo" style="width: 70%;">
                        <p class="fw-bold fs-5 text-center">
                            Posyandu Desa Japan
                        </p>
                    </div>

                    <div class="view2 w-100 rounded-end p-4">
                        <div class="card border-0 mb-3 mt-3">
                            <div class="card-header fw-bold text-center">
                                Buat Tiket Antrian Dulu Yuk!
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <a href="{{ route('antrians.index') }}" class="btn w-75 text-center me-2">
                                    Daftar Antrian
                                </a>
                                <a href="{{ route('ekms.index') }}" class="btn w-75 text-center">
                                    E-KMS
                                </a>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header fw-bold text-center">
                                Akses BIdan & Kader
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <a href="/login" class="btn w-75 text-center">Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="mt-3" src="{{ Vite::asset('resources/images/Logo_Web.png') }}" alt="logo"
                        style="width: 15%;">
                </div>
            </div>
        </div>
    </div>

    {{-- HP --}}
    <div class="container-fluid d-block d-lg-none">
        <div class="row d-flex justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card card_w vstack border-0 shadow-lg">
                    <div class="view1 w-100 rounded-top vstack p-3">
                        <img class="mx-auto d-block" src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}"
                            alt="logo" style="width: 70%;">
                        <p class="fw-bold fs-5 text-center">
                            Posyandu Desa Japan
                        </p>
                    </div>

                    <div class="view2 w-100 rounded-bottom p-3">
                        <div class="card border-0 mt-4">
                            <div class="card-header fw-bold text-center">
                                Buat Tiket Antrian Dulu Yuk!
                            </div>
                            <div class="card-body d-flex flex-row">
                                <a href="{{ route('antrians.index') }}" class="btn w-75 text-center me-2 d-flex justify-content-center align-items-center">
                                    Daftar Antrian
                                </a>
                                <a href="{{ route('ekms.index') }}" class="btn w-75 d-flex justify-content-center align-items-center">
                                    E-KMS
                                </a>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header fw-bold text-center">
                                Akses BIdan & Kader
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <a href="/login" class="btn w-75 text-center">Masuk</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="mt-3" src="{{ Vite::asset('resources/images/Logo_Web.png') }}" alt="logo"
                        style="width: 15%;">
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menampilkan overlay saat halaman dimuat
            document.querySelector('.loading-overlay').style.display = 'flex';

            // Sembunyikan overlay setelah 2 detik setelah semua konten dimuat
            window.addEventListener('load', function() {
                setTimeout(function() {
                    document.querySelector('.loading-overlay').style.display = 'none';
                }, 1000); // 2 detik (dalam milidetik)
            });
        });
    </script>
</body>

</html>
