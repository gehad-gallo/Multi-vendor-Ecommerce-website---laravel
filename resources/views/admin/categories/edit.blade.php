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
                
                    @if (isset($category))
                    <div class="section-body">
                        <div class="container-fluid">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light border-bottom d-flex align-items-center">
                                    <h5 class="mb-0">Editing: <strong>{{ $category->title }}</strong></h5>
                                </div>
                    
                                <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                    
                                    <div class="card-body">
                                        <div class="row gy-4 gx-3">
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" placeholder="Enter category name">
                                            </div>
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Slug</label>
                                                <input type="text" name="slug" class="form-control" value="{{ old('slug', $category->slug) }}" placeholder="Enter slug">
                                            </div>
                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Status</label>
                                                <select name="status" class="form-control form-select">
                                                    <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>

                    
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold d-block">Current Image</label>
                                                <div class="mb-2">
                                                    <img src="{{ asset($category->image) }}" alt="image" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                                </div>
                                                <input type="file" name="image" class="form-control">
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
