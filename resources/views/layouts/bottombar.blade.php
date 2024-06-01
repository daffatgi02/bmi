<div class="bottom-bar">
    <a href="{{ route('admins.validasi') }}" class="{{ Route::is('admins.validasi') ? 'active' : '' }}">
        <i class="bi bi-person{{ Route::is('admins.validasi') ? '-fill' : '' }}"></i>
        <span>Data Akun</span>
    </a>
    <a href="{{ route('admins.index') }}" class="{{ Route::is('admins.index') ? 'active' : '' }}">
        <i class="bi bi-house{{ Route::is('admins.index') ? '-fill' : '' }}"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('admins.riwayat') }}" class="{{ Route::is('admins.riwayat') ? 'active' : '' }}">
        <i class="bi bi-clock{{ Route::is('admins.riwayat') ? '-fill' : '' }}"></i>
        <span>Riwayat</span>
    </a>
</div>
