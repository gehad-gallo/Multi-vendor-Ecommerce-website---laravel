<div style="min-width: 90px;">
<a href="{{ route('admin.sub-category.edit', $subcategory->id) }}" class="btn btn-sm btn-link">
    <i class="fa-solid fa-pen-to-square"></i>
</a>


<form id="delete-form-{{ $subcategory->id }}" action="{{ route('admin.sub-category.destroy', $subcategory->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-link delete-button" data-id="{{ $subcategory->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

</div>