<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-link">
    <i class="fa-solid fa-pen-to-square"></i>
</a>


<form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-link delete-button" data-id="{{ $product->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

