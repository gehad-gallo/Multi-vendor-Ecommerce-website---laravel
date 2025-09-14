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
                
                    @if (isset($brand))
                    <div class="section-body">
                        <div class="container-fluid">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light border-bottom d-flex align-items-center">
                                    <h5 class="mb-0">Editing: <strong>{{ $brand->name }}</strong></h5>
                                </div>
                    
                                <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                    
                                    <div class="card-body">
                                        <div class="row gy-4 gx-3">
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $brand->name) }}">
                                            </div>
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Slug</label>
                                                <input type="text" name="slug" class="form-control" value="{{ old('slug', $brand->slug) }}">
                                            </div>
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select name="status" class="form-control form-select">
                                                    <option value="1" {{ old('status', $brand->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $brand->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                             <label class="form-label fw-semibold">Featured</label>
                                             <select name="is_featured" class="form-control form-select">
                                                 <option value="1" {{ old('is_featured', $brand->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                                                 <option value="0" {{ old('is_featured', $brand->is_featured) == 0 ? 'selected' : '' }}>No</option>
                                             </select>
                                         </div>


                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold d-block">Current Logo</label>
                                                <div class="mb-2">
                                                    <img src="{{ asset($brand->logo) }}" alt="logo" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                                </div>
                                                <input type="file" name="logo" class="form-control">
                                            </div>
                    
                                        </div>
                                    </div>
                    
                                    <div class="card-footer text-end bg-white border-top-0">
                                        <button type="submit" class="btn btn-primary px-4">Update Brand</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    @endif
                </section>
                
      </div>
@endsection
