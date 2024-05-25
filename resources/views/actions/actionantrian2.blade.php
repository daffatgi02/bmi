<div class="d-flex">
    <div>
        <form action="{{ route('kaders.destroy', ['kader' => $dantrian->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-success-cp btn-sm me-2 btn-delete shadow">
                <i class="bi bi-check2-circle fs-6"></i>
            </button>
        </form>
    </div>
</div>
