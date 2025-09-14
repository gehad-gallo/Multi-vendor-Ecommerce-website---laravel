@extends('admin.layouts.master')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Edit Vendor Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Edit Profile</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-10">
          <div class="card shadow-sm">

            <form method="POST" 
                  action="{{ route('admin.vendor-profile.update', $vendor->id) }}" 
                  enctype="multipart/form-data" 
                  class="needs-validation" novalidate>
              @csrf
              @method('PUT')

              {{-- Card Header --}}
              <div class="card-header">
                <h4>Edit Vendor Profile</h4>
              </div>

              <div class="card-body">

                {{-- Alerts --}}
                @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <div>{{ $error }}</div>
                    @endforeach
                  </div>
                @endif

                {{-- Banner --}}
                <div class="form-group text-center">
                  <label class="d-block">Banner</label>
                  @if($vendor->banner)
                    <img src="{{ asset($vendor->banner) }}" 
                         alt="Vendor Banner" 
                         class="img-fluid rounded mb-2" 
                         style="max-height: 200px;">
                  @endif
                  <input type="file" class="form-control" name="banner">
                </div>

                {{-- Address --}}
                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" class="form-control" rows="3" required>{{ old('address', $vendor->address) }}</textarea>
                  <div class="invalid-feedback">Please provide the address</div>
                </div>

                {{-- Social Links --}}
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>Facebook</label>
                    <input type="text" name="fb_link" class="form-control"
                           value="{{ old('fb_link', $vendor->fb_link) }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Twitter</label>
                    <input type="text" name="tw_link" class="form-control"
                           value="{{ old('tw_link', $vendor->tw_link) }}">
                  </div>
                  <div class="form-group col-md-6">
                    <label>Instagram</label>
                    <input type="text" name="insta_link" class="form-control"
                           value="{{ old('insta_link', $vendor->insta_link) }}">
                  </div>
                </div>

                {{-- Email & Phone --}}
                <div class="row">
                  <div class="form-group col-md-7">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $vendor->email) }}" disabled>
                    <div class="invalid-feedback">Email is required</div>
                  </div>
                  <div class="form-group col-md-5">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $vendor->phone) }}">
                  </div>
                </div>

                {{-- Description --}}
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="summernote-simple">
                    {{ old('description', $vendor->description) }}
                  </textarea>
                </div>

              </div>

              {{-- Card Footer --}}
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary px-4">
                  <i class="fas fa-save mr-1"></i> Save Changes
                </button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
