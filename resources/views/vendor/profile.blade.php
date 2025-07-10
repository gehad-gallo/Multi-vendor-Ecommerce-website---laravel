@extends('vendor.layouts.master')
@section('content')
@if(isset($vendor))
<div class="row">
          <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <div class="dashboard_content mt-2 mt-md-0">
              <h3><i class="far fa-user"></i> profile</h3>
              <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                  <h4>basic information</h4><br><br>
                  <form>
                    <div class="row">
                      <div class="col-xl-9">
                        <div class="row">
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fas fa-user-tie"></i>
                              <input type="text" name="name" placeholder="First Name" value="{{ $vendor->name }}" disabled>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fas fa-user-tie"></i>
                              <input type="text" placeholder="Last Name" value="{{ explode(' ', $vendor->user_name)[1] ?? '' }}" disabled>
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="far fa-phone-alt"></i>
                              <input type="text" name="phone" placeholder="Phone" disabled value="{{ $vendor->phone ? $vendor->phone : '' }}">
                            </div>
                          </div>
                          <div class="col-xl-6 col-md-6">
                            <div class="wsus__dash_pro_single">
                              <i class="fal fa-envelope-open"></i>
                              <input type="email" placeholder="Email" value="{{ $vendor->email}}" disabled>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                              <div class="col-xl-12">
                                <a href="{{ route('vendor.profile.edit') }}" class="btn btn-primary px-4 py-2 rounded shadow-sm">
                                  Edit Info
                                </a>
                              </div>
                            </div>
                            
                      </div>
                      
                      <div class="col-xl-3 col-sm-6 col-md-6 d-flex justify-content-center align-items-start">
                        <div class="wsus__dash_pro_img text-center p-3 bg-white rounded shadow" style="width: 100%; max-width: 270px;">
                            <img src="{{ $vendor->image ? asset($vendor->image) : asset('/frontend/assets/images/users/profile.webp') }}"
                                 alt="User Image"
                                 class="img-fluid rounded-circle shadow-sm border"
                                 style="width: 200px; height: 200px; object-fit: cover;">
                            <h6 class="mt-3">{{ $vendor->name }}</h6>
                        </div>
                    </div>
                    
                   
                      <div class="wsus__dash_pass_change mt-2">
                        
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif


@endsection