<div class="bottom-bar">
    <a href="{{ route('danaks.index') }}" class="{{ Route::is('danaks.index') ? 'active' : '' }}">
        <i class="bi bi-person{{ Route::is('danaks.index') ? '-fill' : '' }}"></i>
        <span>Anak</span>
    </a>
    <a href="{{ route('dposyandus.index') }}" class="{{ Route::is('dposyandus.index') ? 'active' : '' }}">
        <i class="bi bi-hospital{{ Route::is('dposyandus.index') ? '-fill' : '' }}"></i>
        <span>Posyandu</span>
    </a>
    <a href="{{ route('bidans.index') }}" class="{{ Route::is('bidans.index') ? 'active' : '' }}">
        <i class="bi bi-house{{ Route::is('bidans.index') ? '-fill' : '' }}"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ route('dbulanans.index') }}" class="{{ Route::is('dbulanans.index') ? 'active' : '' }}">
        <i class="bi bi-clipboard-data{{ Route::is('dbulanans.index') ? '-fill' : '' }}"></i>
        <span>Bulanan</span>
    </a>
    <a href="{{ route('gperkembangans.index') }}" class="{{ Route::is('gperkembangans.index') ? 'active' : '' }}">
        <i class="bi bi-bar-chart-line{{ Route::is('gperkembangans.index') ? '-fill' : '' }}"></i>
        <span>Persebaran</span>
    </a>
</div>
