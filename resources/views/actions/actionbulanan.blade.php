<div class="d-flex">
    <a href="{{ route('dbulanans.edit', ['dbulanan' => $dbulanan->id]) }}" class="btn btn-primary btn-sm me-2 shadow"><i
            class="bi-pencil-square"></i>
    </a>
    <a href="{{ route('dbulanans.show', ['dbulanan' => $dbulanan->danaks_id]) }}"
        class="btn btn-warning btn-sm me-2 shadow">
        <i class="bi bi-file-earmark-bar-graph"></i>
    </a>
    {{-- <a href="{{ route('exportpdf', ['danaks_id' => $dbulanan->danaks_id]) }}" target="__blank"
        class="btn btn-danger btn-sm me-2 shadow">
        <i class="bi bi-file-earmark-bar-graph text-white"></i>
    </a> --}}
</div>
