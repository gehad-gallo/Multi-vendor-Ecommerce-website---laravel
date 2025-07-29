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
                            <h4 class="mb-0">Create New Child Category</h4>
                            <a href="{{ route('admin.child-category.index') }}" class="btn btn-outline-secondary">← Back</a>
                          </div>
                  
                          <div class="card-body">
                            <form action="{{ route('admin.child-category.store') }}" method="POST">
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

                                 {{-- Category --}}
                            <div class="col-md-6 mb-4">
                              <label class="form-label">Category</label>
                              <select id="category-select" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">-- Select category --</option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                              @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>

                            {{-- Sub Category --}}
                            <div class="col-md-6 mb-4">
                              <label class="form-label">Sub Category</label>
                              <select id="sub-category-select" name="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror">
                                <option value="">-- Select Sub Category --</option>
                              </select>
                              @error('sub_category_id')
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
    $('#category-select').on('change', function () {
          var categoryId = $(this).val();
          if (categoryId) {
              $.ajax({
                  url: '/admin/child-category/get-sub-categories/' + categoryId,
                  type: 'GET',
                  success: function (response) {
                      $('#sub-category-select').empty();
                      $('#sub-category-select').append('<option value="">-- Select Sub Category --</option>');
                      $.each(response, function (key, subCategory) {
                          $('#sub-category-select').append('<option value="' + subCategory.id + '">' + subCategory.name + '</option>');
                      });
                  }
              });
          } else {
              $('#sub-category-select').empty();
              $('#sub-category-select').append('<option value="">-- Select Sub Category --</option>');
          }
      });
  </script>
@endpush