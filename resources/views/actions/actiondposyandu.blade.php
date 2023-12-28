<div class="d-flex">
    <a href="{{ route('dposyandus.edit', ['dposyandu' => $dposyandu->id]) }}" class="btn btn-primary btn-sm me-2 shadow"><i
            class="bi-pencil-square"></i></a>

    <div>
        <form action="{{ route('dposyandus.destroy', ['dposyandu' => $dposyandu->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm me-2 btn-delete shadow">
                <i class="bi-trash"></i>
            </button>
        </form>

    </div>
</div>
