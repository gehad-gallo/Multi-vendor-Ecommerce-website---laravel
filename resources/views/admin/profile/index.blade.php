@extends('admin.layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Profile</h1>
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
              </div>
            </div>
            <div class="section-body">
              @if(isset($admin))
              <h2>Hi, {{ explode(' ', $admin->user_name)[0] }}!</h2>
              @endif
              
              <div class="row mt-sm-4">
                
                <div class="col-12 col-md-12 col-lg-7">
                  <div class="card">
                    <form method="post" action="{{route('update.admin.info')}}" class="needs-validation" novalidate="">
                      @csrf
                      <div class="card-header">
                        <h4>Edit Profile</h4>
                      </div>
                      <div class="card-body">
                          <div class="row">                               
                            <div class="form-group col-md-6 col-12">
                              <label>First Name</label>
                              <input type="hidden" class="form-control" name="id" value="{{$admin->id}}">
                              <input type="text" class="form-control" name="first_name" value="{{ explode(' ', $admin->user_name)[0] }}" required="">
                              <div class="invalid-feedback">
                                Please fill in the first name
                              </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label>Last Name</label>
                              <input type="text" class="form-control" name="last_name" value="{{ explode(' ', $admin->user_name)[1] }}" required="">
                              <div class="invalid-feedback">
                                Please fill in the last name
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" value="{{ $admin->email}}" required="">
                              <div class="invalid-feedback">
                                Please fill in the email
                              </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                              <label>Phone</label>
                              <input type="tel" class="form-control" name="phone" value="{{ $admin->phone}}">
                            </div>
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