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
                
                    @if (isset($slider))
                    <div class="section-body">
                        <div class="container-fluid">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light border-bottom d-flex align-items-center">
                                    <h5>Editing: <strong>{{ $slider->title }}</strong></h5>
                                </div>
                
                                <form method="POST" action="{{ route('admin.slider.update', $slider->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                
                                    <div class="card-body">
                                        <div class="row g-4">
                
                                            <div class="col-md-6">
                                                <label class="form-label">Type</label>
                                                <input type="text" name="type" class="form-control" placeholder="e.g. Hero, Promo" value="{{ old('type', $slider->type) }}">
                                            </div>
                
                                            <div class="col-md-6">
                                                <label class="form-label">Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ old('title', $slider->title) }}">
                                            </div>
                
                                            <div class="col-md-6">
                                                <label class="form-label">Starting Price</label>
                                                <input type="number" step="0.01" name="starting_price" class="form-control" placeholder="e.g. 99.99" value="{{ old('starting_price', $slider->starting_price) }}">
                                            </div>
                
                                            <div class="col-md-6">
                                                <label class="form-label">Button URL</label>
                                                <input type="url" name="btn_url" class="form-control" placeholder="https://example.com" value="{{ old('btn_url', $slider->btn_url) }}">
                                            </div>
                
                                            <div class="col-md-6">
                                                <label class="form-label">Serial</label>
                                                <input type="number" name="serial" class="form-control" placeholder="Display order (e.g. 1, 2)" value="{{ old('serial', $slider->serial) }}">
                                            </div>
                                            <br>
                                            <div class="col-md-6">
                                                <label class="form-label">Status</label>
                                                <select name="status" class=" form-control form-select">
                                                    <option value="1" {{ old('status', $slider->status) == 1 ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ old('status', $slider->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                
                                            <div class="col-md-6">
                                                <label class="form-label d-block">Current Banner</label>
                                                <img src="{{ asset($slider->banner) }}" alt="Slider banner" class="img-thumbnail mb-2" style="width: 200px; height: 200px; object-fit: cover;">
                                                <input type="file" name="banner" class="form-control mt-2">
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="card-footer text-end bg-white border-top-0">
                                        <button type="submit" class="btn btn-primary px-4">Update Slider</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </section>
                
      </div>
@endsection
