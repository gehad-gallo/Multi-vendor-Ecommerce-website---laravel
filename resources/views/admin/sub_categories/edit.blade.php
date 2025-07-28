@extends('admin.layouts.master')

@section('content')
<div class="main-content">
          <section class="section py-4">
                    <div class="section-header mb-4">
                        @if ($errors->any())
                                    <script>
                                    @foreach ($errors->all() as $error)
                                    toastr.error("{{ $error }}");
                                    @endforeach
                                    </script>
                        @endif

                    </div>
                
                    @if (isset($sub_category))
                    <div class="section-body">
                        <div class="container-fluid">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light border-bottom d-flex align-items-center">
                                    <h5 class="mb-0">Editing: <strong>{{ $sub_category->title }}</strong></h5>
                                </div>
                    
                                <form method="POST" action="{{ route('admin.sub-category.update', $sub_category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                    
                                    <div class="card-body">
                                        <div class="row gy-4 gx-3">
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $sub_category->name) }}" placeholder="Enter category name">
                                            </div>
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Slug</label>
                                                <input type="text" name="slug" class="form-control" value="{{ old('slug', $sub_category->slug) }}" placeholder="Enter slug">
                                            </div>
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select name="status" class="form-control form-select">
                                                    <option value="1" {{ old('status', $sub_category->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $sub_category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>

                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold d-block">Current Icon</label>
                                                <i class="{{$sub_category->icon}}"></i>
                                            </div>
                    
                                        </div>
                                    </div>

                                    {{-- Icon Picker --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Icon</label>
                                    <select name="icon" class="form-control @error('icon') is-invalid @enderror" onchange="updateIconPreview(this)">
                                      <option value="">-- Select Icon --</option>
                                      <option value="fa fa-star" {{ old('icon') == 'fa fa-star' ? 'selected' : '' }}>⭐ Star</option>
                                      <option value="fa fa-heart" {{ old('icon') == 'fa fa-heart' ? 'selected' : '' }}>❤️ Heart</option>
                                      <option value="fa fa-car" {{ old('icon') == 'fa fa-car' ? 'selected' : '' }}>🚗 Car</option>
                                      <option value="fa fa-home" {{ old('icon') == 'fa fa-home' ? 'selected' : '' }}>🏠 Home</option>
                                      <option value="fa fa-book" {{ old('icon') == 'fa fa-book' ? 'selected' : '' }}>📚 Book</option>
                                      <!-- Add more icons as needed -->
                                    </select>
                                    @error('icon')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                  
                                    <div class="mt-2">
                                      <strong>Preview:</strong> <i id="icon-preview" class="{{ old('icon') }}"></i>
                                    </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $sub_category->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                


                    
                                    <div class="card-footer text-end bg-white border-top-0">
                                        <button type="submit" class="btn btn-primary px-4">Update Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    @endif
                </section>
                
      </div>
@endsection
@push('scripts')
<script>
    function updateIconPreview(select) {
        const iconPreview = document.getElementById('icon-preview');
        iconPreview.className = select.value;
    }

    // On page load (if there's an old value)
    document.addEventListener('DOMContentLoaded', function () {
        const iconSelect = document.querySelector('select[name="icon"]');
        if (iconSelect && iconSelect.value) {
            updateIconPreview(iconSelect);
        }
    });
</script>
@endpush