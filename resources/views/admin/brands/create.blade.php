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
                            <h4 class="mb-0">Create New Brand</h4>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary">← Back</a>
                          </div>
                  
                          <div class="card-body">
                            <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
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
                                {{-- Logo --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Logo</label>
                                  <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" onchange="previewImage(event)">

                                  @error('logo')
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

                                {{-- Feature --}}
                                <div class="col-md-6 mb-4">
                                   <label class="form-label">Feature</label>
                                   <select name="is_featured" class="form-control @error('is_featured') is-invalid @enderror">
                                     <option value="">-- Select Status --</option>
                                     <option value="1" {{ old('is_featured') == 'active' ? 'selected' : '' }}>yes</option>
                                     <option value="0" {{ old('is_featured') == 'unactive' ? 'selected' : '' }}>no</option>
                                   </select>
                                   @error('is_featured')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                   @enderror
                                 </div>
  

                              </div>
                  
                              {{-- Submit Button --}}
                              <div class="text-end">
                                <button type="submit" class="btn btn-primary px-4">
                                  <i class="fas fa-save me-1"></i> Save Brand
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