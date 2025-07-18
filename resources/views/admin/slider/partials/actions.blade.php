<a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-sm btn-link">
    <i class="fa-solid fa-pen-to-square"></i>
</a>


<form id="delete-form-{{ $slider->id }}" action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-link delete-button" data-id="{{ $slider->id }}">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>

