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
                            <h4 class="mb-0">Create New Product</h4>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary">← Back</a>
                          </div>
                  
                          <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                  
                                {{-- Name --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Name</label>
                                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="category name" value="{{ old('name') }}">
                                  @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>


                                {{-- thumb_image --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">thumb_image</label>
                                  <input type="file" name="thumb_image" class="form-control @error('thumb_image') is-invalid @enderror" onchange="previewImage(event)">

                                  @error('thumb_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="row">

                                  {{-- Category --}}
                                  <div class="col-md-6 mb-3">
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
                                  <div class="col-md-6 mb-3">
                                    <label class="form-label">Sub Category</label>
                                    <select id="sub-category-select" name="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror">
                                      <option value="">-- Select Sub Category --</option>
                                    </select>
                                    @error('sub_category_id')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                  </div>


                                  {{-- Child Category --}}
                                  <div class="col-md-6 mb-3">
                                    <label class="form-label">Child Category</label>
                                    <select id="child-category-select" name="child_category_id" class="form-control @error('child_category_id') is-invalid @enderror">
                                      <option value="">-- Select Child Category --</option>
                                    </select>
                                    @error('child_category_id')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                 </div>

                                  
                                </div>

  
                                  {{-- Brand --}}
                                  <div class="col-md-6 mb-4">
                                    <label class="form-label">Brand</label>
                                    <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                      <option value="">-- Select Brand --</option>
                                      @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                      @endforeach
                                    </select>
                                    @error('brand_id')
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

                                    {{-- SKU --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Sku</label>
                                      <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku') }}">
                                      @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    {{-- price --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">price</label>
                                      <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                      @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
      
                              
                                    {{-- offer price --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Offer price</label>
                                      <input type="text" name="offer_price" class="form-control @error('offer_price') is-invalid @enderror" value="{{ old('offer_price') }}">
                                      @error('offer_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
      
                                    <div class="row">

                                    {{-- Offer start date --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Offer start date</label>
                                      <input type="date" name="offer_start_date" class="form-control @error('offer_start_date') is-invalid @enderror" value="{{ old('offer_start_date') }}">
                                      @error('offer_start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
      
                                    {{-- Offer end date --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Offer end date</label>
                                      <input type="date" name="offer_end_date" class="form-control @error('offer_end_date') is-invalid @enderror" value="{{ old('offer_end_date') }}">
                                      @error('offer_end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    </div>
    
                                    {{-- stock quantity --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Stock quantity</label>
                                      <input type="text" name="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}">
                                      @error('qty')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>


                                    {{-- video link --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Video link</label>
                                      <input type="text" name="video_link" class="form-control @error('video_link') is-invalid @enderror" value="{{ old('video_link') }}">
                                      @error('video_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
      

                                    {{-- Short description --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Short description</label>                                    
                                      <textarea name="short_description" class="form-control"></textarea>
                                      @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    {{-- Long description --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Long description</label>                                    
                                      <textarea name="long_description" class="form-control"></textarea>
                                      @error('long_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>

                                    <div class="row">

                                      {{-- Is Featured --}}
                                      <div class="col-md-4 mb-4">
                                        <label class="form-label">Is Featured</label>
                                        <select name="is_featured" class="form-control @error('is_featured') is-invalid @enderror">
                                          <option value="">-- Select option --</option>
                                          <option value="1" {{ old('is_featured') == 'yes' ? 'selected' : '' }}>Yes</option>
                                          <option value="0" {{ old('is_featured') == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                      </div>



                                      {{-- Is Best --}}
                                      <div class="col-md-4 mb-4">
                                        <label class="form-label">Is Best</label>
                                        <select name="is_best" class="form-control @error('is_best') is-invalid @enderror">
                                          <option value="">-- Select option --</option>
                                          <option value="1" {{ old('is_best') == 'yes' ? 'selected' : '' }}>Yes</option>
                                          <option value="0" {{ old('is_best') == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                      </div>



                                      {{-- Is Top --}}
                                      <div class="col-md-4 mb-4">
                                        <label class="form-label">Is Top</label>
                                        <select name="is_top" class="form-control @error('is_top') is-invalid @enderror">
                                          <option value="">-- Select option --</option>
                                          <option value="1" {{ old('is_top') == 'yes' ? 'selected' : '' }}>Yes</option>
                                          <option value="0" {{ old('is_top') == 'no' ? 'selected' : '' }}>No</option>
                                        </select>
                                      </div>
                                    </div>


                                    {{-- Seo title --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Seo Title </label>
                                      <input type="text" name="seo_title" class="form-control @error('seo_title') is-invalid @enderror" value="{{ old('seo_title') }}">
                                      @error('seo_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
      
      
                                    {{-- Seo description --}}
                                    <div class="col-md-6 mb-3">
                                      <label class="form-label">Seo description </label>
                                      <input type="text" name="seo_description" class="form-control @error('seo_description') is-invalid @enderror" value="{{ old('seo_description') }}">
                                      @error('seo_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                    </div>
      
      
                                {{-- Submit Button --}}
                                <div class="text-end">
                                  <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-1"></i> create product
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

  // Load Sub Categories
  $('#category-select').on('change', function () {
      var categoryId = $(this).val();
      if (categoryId) {
          $.ajax({
              url: '/admin/products/get-sub-categories/' + categoryId,
              type: 'GET',
              success: function (response) {
                  $('#sub-category-select').empty()
                      .append('<option value="">-- Select Sub Category --</option>');
                  $.each(response, function (key, subCategory) {
                      $('#sub-category-select').append('<option value="' + subCategory.id + '">' + subCategory.name + '</option>');
                  });
                  $('#child-category-select').empty()
                      .append('<option value="">-- Select Child Category --</option>');
              }
          });
      } else {
          $('#sub-category-select').empty()
              .append('<option value="">-- Select Sub Category --</option>');
          $('#child-category-select').empty()
              .append('<option value="">-- Select Child Category --</option>');
      }
  });

  // Load Child Categories
  $('#sub-category-select').on('change', function () {
      var subCategoryId = $(this).val();
      if (subCategoryId) {
          $.ajax({
              url: '/admin/products/get-child-category/' + subCategoryId,
              type: 'GET',
              success: function (response) {
                  $('#child-category-select').empty()
                      .append('<option value="">-- Select Child Category --</option>');
                  $.each(response, function (key, childCategory) {
                      $('#child-category-select').append('<option value="' + childCategory.id + '">' + childCategory.name + '</option>');
                  });
              }
          });
      } else {
          $('#child-category-select').empty()
              .append('<option value="">-- Select Child Category --</option>');
      }
  });

  </script>
@endpush