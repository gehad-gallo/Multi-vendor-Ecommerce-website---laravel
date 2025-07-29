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
                
                    @if (isset($child_category))
                    <div class="section-body">
                        <div class="container-fluid">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light border-bottom d-flex align-items-center">
                                    <h5 class="mb-0">Editing: <strong>{{ $child_category->name }}</strong></h5>
                                </div>
                    
                                <form method="POST" action="{{ route('admin.child-category.update', $child_category->id) }}">
                                    @csrf
                                    @method('PUT')
                    
                                    <div class="card-body">
                                        <div class="row gy-4 gx-3">
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $child_category->name) }}">
                                            </div>
                
                                        {{-- Category --}}
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Category</label>
                                            <select id="category-select" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" 
                                                    {{ old('category_id', $child_category->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>                                            
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
                                                
                                            </select>
                                            @error('sub_category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select name="status" class="form-control form-select">
                                                    <option value="1" {{ old('status', $child_category->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $child_category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                    
                    
                                        </div>
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