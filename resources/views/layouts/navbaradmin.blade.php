<nav class="navbar shadow">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-bold" href="#">Connect Care Pediatrics</a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <i class='bx bx-menu fs-2'></i>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="nav-list">
                    <a href="{{ route('admins.index') }}">
                        <li>
                            <i class='bx bx-grid-alt'></i>
                            <span>Dashboard</span>
                        </li>
                    </a>
                    <a href="{{ route('admins.validasi') }}">
                        <li>
                            <i class='bx bx-user'></i>
                            <span>Data Akun</span>
                        </li>
                    </a>
                    <a href="{{ route('admins.validasi') }}">
                        <li>
                            <i class='bx bx-history'></i>
                            <span>Riwayat</span>
                        </li>
                    </a>

                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <li class="profile" id="btn-logout">

                            <i class='bx bx-log-out out' id="log_out"></i>
                            Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</nav>


<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Connect Pediatrics</div>
        <i class='bx bx-menu d-xxl-block d-none' id="btn" style='color:#ffffff'></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('admins.index') }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('admins.validasi') }}">
                <i class='bx bx-user'></i>
                <span class="links_name">Data Akun</span>
            </a>
            <span class="tooltip">Data Akun</span>
        </li>
        <li>
            <a href="{{ route('admins.riwayat') }}">
                <i class='bx bx-history'></i>
                <span class="links_name">Riwayat</span>
            </a>
            <span class="tooltip">Riwayat</span>
        </li>

        <li class="profile">
            <div class="profile-details">
                <i class="bi bi-person-circle" style='color:#ffffff'></i>
                <div class="name_job">
                    <div class="name"> {{ Auth::user()->name }}</div>
                </div>
            </div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                <i class='bx bx-log-out out' id="log_out"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
