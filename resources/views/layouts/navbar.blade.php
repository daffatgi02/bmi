{{-- PC --}}
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Connect Pediatrics</div>
        <i class='bx bx-menu d-xxl-block d-none' id="btn" style='color:#ffffff'></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('bidans.index') }}">
                <i class="bi bi-house"></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{ route('danaks.index') }}">
                <i class="bi bi-person"></i>
                <span class="links_name">Data Anak</span>
            </a>
            <span class="tooltip">Data Anak</span>
        </li>
        <li>
            <a href="{{ route('dposyandus.index') }}">
                <i class="bi bi-building-add"></i>
                <span class="links_name">Data Posyandu</span>
            </a>
            <span class="tooltip">Data Posyandu</span>
        </li>
        <li>
            <a href="{{ route('dbulanans.index') }}">
                <i class="bi bi-clipboard-data"></i>
                <span class="links_name">Data Bulanan</span>
            </a>
            <span class="tooltip">Data Bulanan</span>
        </li>
        <li>
            <a href="{{ route('gperkembangans.index') }}">
                <i class="bi bi-bar-chart-line"></i>
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
