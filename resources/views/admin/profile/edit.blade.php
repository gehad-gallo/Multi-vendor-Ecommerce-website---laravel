@extends('admin.layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
          <section class="section">
                    <div class="section-header">
                      <h1>Admin Profile</h1>
                      <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Profile</a></div>
                      </div>
                    </div>
                  
                    <div class="section-body">
                      @if(isset($admin))
                        <h2>Hello, {{ explode(' ', $admin->user_name)[0] }}!</h2>
                      @endif
                  
                      <div class="row mt-sm-4">
                  
                        {{-- Profile Edit Form --}}
                        <div class="col-12 col-md-12 col-lg-7">
                          <div class="card">
                            <form method="POST" action="{{ route('admin.update.info') }}" class="needs-validation" novalidate enctype="multipart/form-data">
                              @csrf
                  
                              <div class="card-header">
                                <h4>Edit Profile</h4>
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
                  
                                {{-- Profile Fields --}}
                                <div class="form-group">
                                  <label>Photo</label>
                                  <input type="file" class="form-control" name="image">
                                </div>
                  
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                  
                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{ explode(' ', $admin->user_name)[0] }}" required>
                                    <div class="invalid-feedback">Please fill in the first name</div>
                                  </div>
                  
                                  <div class="form-group col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="last_name" value="{{ explode(' ', $admin->user_name)[1] }}" required>
                                    <div class="invalid-feedback">Please fill in the last name</div>
                                  </div>
                                </div>
                  
                                <div class="row">
                                  <div class="form-group col-md-7">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $admin->email }}" required>
                                    <div class="invalid-feedback">Please fill in the email</div>
                                  </div>
                  
                                  <div class="form-group col-md-5">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $admin->phone }}">
                                  </div>
                                </div>
                  
                              </div>
                  
                              <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                  
                        {{-- Password Update Form --}}
                        <div class="col-12 col-md-12 col-lg-7">
                          <div class="card">
                            <form method="POST" action="{{ route('admin.update.password') }}" class="needs-validation" novalidate>
                              @csrf
                  
                              <div class="card-header">
                                <h4>Update Password</h4>
                              </div>
                  
                              <div class="card-body">
                  
                                <input type="hidden" name="id" value="{{ $admin->id }}">
                  
                                <div class="form-group">
                                  <label>Current Password</label>
                                  <input type="password" class="form-control" name="current_pass" required>
                                </div>
                  
                                <div class="form-group">
                                  <label>New Password</label>
                                  <input type="password" class="form-control" name="new_pass" required>
                                </div>
                  
                                <div class="form-group">
                                  <label>Confirm New Password</label>
                                  <input type="password" class="form-control" name="new_pass_confirmation" required>
                                </div>
                  
                              </div>
                  
                              <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                              </div>
                  
                            </form>
                          </div>
                        </div>
                  
                      </div>
                    </div>
                  </section>
                  
        </div>
@endsection