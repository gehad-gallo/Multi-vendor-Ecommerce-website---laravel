<a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-link">
    <i class="fa-solid fa-pen-to-square"></i>
</a>


<form id="delete-form-{{ $brand->id }}" action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-link delete-button" data-id="{{ $brand->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

