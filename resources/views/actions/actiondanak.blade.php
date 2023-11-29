<div class="d-flex">
    <a href="{{ route('danaks.edit', ['danak' => $danak->id]) }}" class="btn btn-primary btn-sm me-2 shadow"><i
            class="bi-info-circle"></i></a>

    <div>
        <form action="{{ route('danaks.destroy', ['danak' => $danak->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm me-2 btn-delete shadow">
                <i class="bi-trash"></i>
            </button>
        </form>

    </div>
</div>
