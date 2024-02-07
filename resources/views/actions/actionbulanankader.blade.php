<div class="d-flex">
    <a href="{{ route('kaders.edit', ['kader' => $dbulan->id]) }}" class="btn btn-primary btn-sm me-2 shadow">
        <i class="bi-pencil-square"></i>
    </a>
    <a href="{{ route('kaders.show', ['kader' => $dbulan->danaks_id]) }}" class="btn btn-warning btn-sm me-2 shadow">
        <i class="bi bi-file-earmark-bar-graph"></i>
    </a>
    <div>
        <form action="{{ route('destroykader', ['id' => $dbulan->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm me-2 btn-delete shadow">
                <i class="bi-trash"></i>
            </button>
        </form>
    </div>
</div>
