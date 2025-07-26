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
                            <h4 class="mb-0">Create New Category</h4>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">← Back</a>
                          </div>
                  
                          <div class="card-body">
                            <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
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
                                {{-- Image --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Image</label>
                                  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage(event)">

                                  @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
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