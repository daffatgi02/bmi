<div class="sidebar d-none d-md-block open">
    <div class="logo-details">
        <div class="logo_name">Connect Pediatrics</div>
        <i class='bx bx-menu' id="btn" style='color:#ffffff'></i>
    </div>
    <ul class="nav-list">
        <li class="{{ Route::is('admins.index') ? 'active' : '' }}">
            <a href="{{ route('admins.index') }}" class="nav-link">
                <i class="bi bi-house{{ Route::is('admins.index') ? '-fill' : '' }}"></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li class="{{ Route::is('admins.validasi') ? 'active' : '' }}">
            <a href="{{ route('admins.validasi') }}" class="nav-link">
                <i class="bi bi-person{{ Route::is('admins.validasi') ? '-fill' : '' }}"></i>
                <span class="links_name">Data Akun</span>
            </a>
            <span class="tooltip">Data Akun</span>
        </li>
        <li class="{{ Route::is('admins.riwayat') ? 'active' : '' }}">
            <a href="{{ route('admins.riwayat') }}" class="nav-link">
                <i class="bi bi-clock{{ Route::is('admins.riwayat') ? '-fill' : '' }}"></i>
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
