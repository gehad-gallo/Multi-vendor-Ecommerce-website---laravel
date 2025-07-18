@extends('admin.layouts.master')
@section('content')
<!-- Main Content -->
<div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>
                @if(isset($admin))
                <h2>Hi, {{ explode(' ', $admin->user_name)[0] }}!</h2>
                @endif
              </h1>
              
              <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{route('admin.edit.info')}}">Edit Profile</div>
              </div>
            </div>
            <div class="section-body">
             
              
              <div class="row mt-sm-4">
                
                <div class="col-12 col-md-12 col-lg-7">
                  <div class="card">
                    <form method="post" action="" class="needs-validation" novalidate="" enctype="multipart/form-data">
                      @csrf
                      <div class="card-body">
                        @if(session('success'))
                            <div style="background-color: #d4edda; color: #155724; padding: 15px 20px; border-left: 5px solid #28a745; border-radius: 5px; margin-top: 15px; font-weight: 500;">
                                ✅ {{ session('success') }}
                            </div>
                        @endif
                        <br>

                          <div class="row">                               
                            <div class="form-group col-md-12 col-12">
                              <img src="{{ asset($admin->image) }}" alt="Admin Photo" style="max-width: 500px; height: auto; border-radius: 10px; margin-bottom: 10px;">
                          </div>
                            <div class="form-group col-md-6 col-12">
                              <label>First Name</label>
                              <input type="hidden" disabled class="form-control" name="id" value="{{$admin->id}}">
                              <input type="text" disabled class="form-control" name="first_name" value="{{ explode(' ', $admin->user_name)[0] }}" required="">
                              <div class="invalid-feedback">
                                Please fill in the first name
                              </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label>Last Name</label>
                              <input type="text" disabled class="form-control" name="last_name" value="{{ explode(' ', $admin->user_name)[1] }}" required="">
                              <div class="invalid-feedback">
                                Please fill in the last name
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label>Email</label>
                              <input type="email" disabled class="form-control" name="email" value="{{ $admin->email}}" required="">
                              <div class="invalid-feedback">
                                Please fill in the email
                              </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                              <label>Phone</label>
                              <input type="text" disabled class="form-control" name="phone" value="{{ $admin->phone}}">
                            </div>
                          </div>
                         
                          
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
@endsection