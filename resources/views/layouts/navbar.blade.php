{{-- PC --}}
<div class="sidebar d-none d-md-block open">
    <div class="logo-details">
        <div class="logo_name">Connect Pediatrics</div>
        <i class='bx bx-menu' id="btn" style='color:#ffffff'></i>
    </div>
    <ul class="nav-list">
        <li class="{{ Route::is('bidans.index') ? 'active' : '' }}">
            <a href="{{ route('bidans.index') }}" class="nav-link">
                <i class="bi bi-house{{ Route::is('bidans.index') ? '-fill' : '' }}"></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li class="{{ Route::is('danaks.index') ? 'active' : '' }}">
            <a href="{{ route('danaks.index') }}" class="nav-link">
                <i class="bi bi-person{{ Route::is('danaks.index') ? '-fill' : '' }}"></i>
                <span class="links_name">Data Anak</span>
            </a>
            <span class="tooltip">Data Anak</span>
        </li>
        <li class="{{ Route::is('dposyandus.index') ? 'active' : '' }}">
            <a href="{{ route('dposyandus.index') }}" class="nav-link">
                <i class="bi bi-hospital{{ Route::is('dposyandus.index') ? '-fill' : '' }}"></i>
                <span class="links_name">Data Posyandu</span>
            </a>
            <span class="tooltip">Data Posyandu</span>
        </li>
        <li class="{{ Route::is('dbulanans.index') ? 'active' : '' }}">
            <a href="{{ route('dbulanans.index') }}" class="nav-link">
                <i class="bi bi-clipboard-data{{ Route::is('dbulanans.index') ? '-fill' : '' }}"></i>
                <span class="links_name">Data Bulanan</span>
            </a>
            <span class="tooltip">Data Bulanan</span>
        </li>
        <li class="{{ Route::is('gperkembangans.index') ? 'active' : '' }}">
            <a href="{{ route('gperkembangans.index') }}" class="nav-link">
                <i class="bi bi-bar-chart-line{{ Route::is('gperkembangans.index') ? '-fill' : '' }}"></i>
                <span class="links_name">Grafik Persebaran</span>
            </a>
            <span class="tooltip">Grafik Persebaran</span>
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

