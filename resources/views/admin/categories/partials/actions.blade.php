<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-link">
    <i class="fa-solid fa-pen-to-square"></i>
</a>


<form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-link delete-button" data-id="{{ $category->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

