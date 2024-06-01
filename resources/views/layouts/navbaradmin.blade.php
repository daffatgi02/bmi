<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Connect Pediatrics</div>
        <i class='bx bx-menu d-xxl-block d-none' id="btn" style='color:#ffffff'></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('admins.index') }}">
                <i class="bi bi-house"></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('admins.validasi') }}">
                <i class="bi bi-person"></i>
                <span class="links_name">Data Akun</span>
            </a>
            <span class="tooltip">Data Akun</span>
        </li>
        <li>
            <a href="{{ route('admins.riwayat') }}">
                <i class="bi bi-clock"></i>
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
