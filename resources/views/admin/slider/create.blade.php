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
                            <h4 class="mb-0">Create New Slider</h4>
                            <a href="{{ route('admin.slider.index') }}" class="btn btn-outline-secondary">← Back</a>
                          </div>
                  
                          <div class="card-body">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="row">
                                {{-- Banner Image --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Banner Image</label>
                                  <input type="file" name="banner" class="form-control @error('banner') is-invalid @enderror" onchange="previewImage(event)">
                                  @error('banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                  <img id="preview" src="#" alt="Image Preview" class="img-fluid mt-2 d-none" style="max-height: 200px;">
                                </div>
                  
                                {{-- Type --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Type</label>
                                  <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="e.g. New Arrival" value="{{ old('type') }}">
                                  @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                  
                                {{-- Title --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Title</label>
                                  <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Slider Title" value="{{ old('title') }}">
                                  @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                  
                                {{-- Starting Price --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">Starting Price</label>
                                  <input type="text" name="starting_price" class="form-control @error('starting_price') is-invalid @enderror" placeholder="$99" value="{{ old('starting_price') }}">
                                  @error('starting_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                  
                                {{-- Button URL --}}
                                <div class="col-md-12 mb-3">
                                  <label class="form-label">Button URL</label>
                                  <input type="text" name="btn_url" class="form-control @error('btn_url') is-invalid @enderror" placeholder="https://example.com" value="{{ old('btn_url') }}">
                                  @error('btn_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                </div>
                  
                                {{-- Serial --}}
                                <div class="col-md-6 mb-3">
                                  <label class="form-label">
                                    <i class="fas fa-hashtag me-1"></i> Serial
                                    <span data-bs-toggle="tooltip" title="Enter the order of appearance (e.g., 1, 2, 3)">
                                      <i class="fas fa-info-circle text-muted"></i>
                                    </span>
                                  </label>
                                  <input type="text" name="serial" class="form-control @error('serial') is-invalid @enderror" placeholder="1" value="{{ old('serial') }}">
                                  @error('serial')
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
                                  <i class="fas fa-save me-1"></i> Save Slider
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