<div class="sidebar">
    <div class="logo-details">
        <i class='bx bx-home-heart icon' style='color:#ffffff'></i>
        <div class="logo_name">Posyandu</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('bidans.index') }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li>
            <a href="{{route('danaks.index')}}">
                <i class='bx bx-user'></i>
                <span class="links_name">Data Anak</span>
            </a>
            <span class="tooltip">Data Anak</span>
        </li>
        <li>
            <a href="{{route('dposyandus.index')}}">
                <i class='bx bx-building-house'></i>
                <span class="links_name">Data Posyandu</span>
            </a>
            <span class="tooltip">Data Posyandu</span>
        </li>
        <li>
            <a href="{{route('gperkembangans.index')}}">
                <i class='bx bx-line-chart' ></i>
                <span class="links_name">Grafik Perkembangan</span>
            </a>
            <span class="tooltip">Grafik Perkembangan</span>
        </li>
        <li>
            <a href="{{route('dbulanans.index')}}">
                <i class='bx bx-table' ></i>
                <span class="links_name">Data Bulanan</span>
            </a>
            <span class="tooltip">Data Bulanan</span>
        </li>

        <li class="profile">
            <div class="profile-details">
                <i class="bi bi-person-circle"></i>
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
