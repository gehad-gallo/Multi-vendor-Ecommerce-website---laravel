@extends('admin.layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
          @if ($errors->any())
                    <script>
                    @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                    @endforeach
                    </script>
          @endif
          <section class="section">
            <div class="section-header">
                    
              <h1>Table</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
              </div>
            </div>
            <div class="section-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="card shadow-sm rounded">
                          <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Create New Sub-Category</h4>
                            <a href="{{ route('admin.sub-category.index') }}" class="btn btn-outline-secondary">← Back</a>
                          </div>
                  
                          <div class="card-body">
                            <form action="{{ route('admin.sub-category.store') }}" method="POST">
                              @csrf
                              <div class="row">
                  
                                {{-- Name --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="category name" value="{{ old('name') }}">
                                  @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
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
                  
                                {{-- Slug --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Slug</label>
                                  <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="category slug" value="{{ old('slug') }}">
                                  @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                  
                                {{-- Status --}}
                                <div class="col-md-6 mb-4">
                                  <label class="form-label">Status</label>
                                  <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">-- Select Status --</option>
                                    <option value="1" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == 'unactive' ? 'selected' : '' }}>Unactive</option>
                                  </select>
                                  @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>

                                {{-- Category --}}
                              <div class="col-md-6 mb-4">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                  <option value="">-- Select category --</option>
                                  @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                                @error('category_id')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                              </div>


                              </div>
                  
                              {{-- Submit Button --}}
                              <div class="text-end">
                                <button type="submit" class="btn btn-primary px-4">
                                  <i class="fas fa-save me-1"></i> Save Category
                                </button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
