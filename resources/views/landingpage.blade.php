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
            background-color: #F2FFFA;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .cards {
            width: 50rem;
            height: 20rem;
            border-radius: 10px
        }

        .wcard {
            height: 100vh;
        }

        .card1 {
            background-color: #3BDD9B;
            height: 100%;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;

        }

        .card2 {
            background-color: #3E6B58;
            height: 100%;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        .card-bodys {
            display: flex;
            height: 100%;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            /* Background putih dengan opasitas */
            z-index: 9999;
            /* Menempatkan overlay di atas konten lain */
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            /* Mulai dengan opasitas 0 */
            animation: fadeIn 0.4s ease-in-out forwards;
            /* Animasi fade-in selama 0.3 detik */

        }

        @keyframes fadeIn {
            from {
                opacity: 0.4;
                /* Opasitas awal */
            }

            to {
                opacity: 1;
                /* Opasitas akhir */
            }
        }


        /* CSS untuk spinner */
        .spinner-container {
            text-align: center;
            font-size: 25px;
        }

        .card-header {
            background-color: #3BDD9B;
        }

        .btn {
            background-color: #3E6B58;
            color: #F2FFFA;
            font-weight: bold
        }

        .btn:hover {
            background-color: #68a98e;
            color: #0c1b15;
            font-weight: bold
        }


        .cards2 {
            width: 23rem;
            height: 40rem;
            border-radius: 10px
        }

        .card-bodys2 {
            display: flex;
            flex-direction: column;
            height: 100%;
            background-color: yellow
        }

        .card11 {
            background-color: #3BDD9B;
            height: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;

        }

        .card22 {
            background-color: #3E6B58;
            height: 100%;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px
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
    <div class="row d-none d-lg-block">
        <div class="col-8">
            <div class="cards shadow-lg">
                <div class="card-bodys">
                    <div class="col-6 card1 vstack">
                        <img class="img-fluid mx-auto mb-2 mt-3"
                            src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}" alt="logo"
                            style="width: 80%;">
                        <p class="text-center fw-bold fs-5">
                            Posyandu Desa Japan
                        </p>
                    </div>

                    <div class="col-6 card2 p-3">
                        <div class="vstack">
                            <div class="card border-0 mb-3 mt-3">
                                <div class="card-header fw-bold text-center">
                                    Buat Tiket Antrian Dulu Yuk!
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <a href="{{ route('antrians.index') }}" class="btn w-50 text-center">Daftar
                                        Antrian</a>
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header fw-bold text-center">
                                    Akses BIdan & Kader
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <a href="/login" class="btn w-50 text-center">Masuk</a>
                                </div>
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
    <div class="row d-block d-lg-none">
        <div class="col-8 p-3 ps-3">
            <div class="cards2 shadow-lg">
                <div class="card-bodys2">
                    <div class="row card11">
                        <div class="col vstack">
                            <img class="img-fluid mx-auto mb-2 mt-3"
                                src="{{ Vite::asset('resources/images/LogoMojokerto.png') }}" alt="logo"
                                style="width: 80%;">
                            <p class="text-center fw-bold fs-5">
                                Posyandu Desa Japan
                            </p>
                        </div>
                    </div>
                    <div class="row card22">
                        <div class="col vstack px-4 mt-3">
                            <div class="card border-0 mb-3 mt-3">
                                <div class="card-header fw-bold text-center">
                                    Buat Tiket Antrian Dulu Yuk!
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <a href="{{ route('antrians.index') }}" class="btn w-50 text-center">Daftar
                                        Antrian</a>
                                </div>
                            </div>
                            <div class="card border-0">
                                <div class="card-header fw-bold text-center">
                                    Akses BIdan & Kader
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <a href="/login" class="btn w-50 text-center">Masuk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="mt-3" src="{{ Vite::asset('resources/images/Logo_Web.png') }}" alt="logo"
                        style="width: 20%;">
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
