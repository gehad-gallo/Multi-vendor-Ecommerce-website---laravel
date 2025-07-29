<a href="{{ route('admin.child-category.edit', $child_category->id) }}" class="btn btn-sm btn-link">
    <i class="fa-solid fa-pen-to-square"></i>
</a>


<form id="delete-form-{{ $child_category->id }}" action="{{ route('admin.child-category.destroy', $child_category->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-link delete-button" data-id="{{ $child_category->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

