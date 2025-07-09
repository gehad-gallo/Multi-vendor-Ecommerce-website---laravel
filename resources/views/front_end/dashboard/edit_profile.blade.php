@extends('front_end.dashboard.layouts.master')
@section('content')
@if(isset($user))
<div class="row">
          <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <div class="dashboard_content mt-2 mt-md-0">
              <h3><i class="far fa-user"></i> profile</h3>
              <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                  <h4>basic information</h4><br>
                  <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-user-tie"></i>
                                        <input type="text" name="first_name" placeholder="First Name" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fas fa-user-tie"></i>
                                        <input type="text" name="last_name" placeholder="Last Name" value="{{ explode(' ', $user->user_name)[1] ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="far fa-phone-alt"></i>
                                        <input type="text" name="phone" placeholder="Phone" value="{{ old('phone', $user->phone ?? '') }}">

                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__dash_pro_single">
                                        <i class="fal fa-envelope-open"></i>
                                        <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div class="col-xl-3 col-sm-6 col-md-6">
                            <div class="wsus__dash_pro_img">
                              <img src="{{ $user->image ? asset($user->image) : asset('/frontend/assets/images/users/profile.webp') }}"
                              alt="User Image"
                              class="img-fluid rounded-circle shadow-sm border"
                              style="width: 200px; height: 200px; object-fit: cover;"><br><br><br><br>
                                <input type="file" name="image">
                            </div>
                        </div>
                
                        <div class="col-xl-12">
                            <button class="common_btn" type="submit">Update Info</button>
                        </div>
                    </div>
                </form>
                
                   <hr>
                      <div class="wsus__dash_pass_change mt-2">
                              <div class="row">
                              <h4>Change password </h4><br><br>
                              <form method="post" action="{{route('user.password.update')}}">
                                        @csrf
                                        <div class="col-xl-4 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                        <i class="fas fa-unlock-alt"></i>
                                        <input type="password" name="current_password" placeholder="Current Password">
                                        </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                        <i class="fas fa-lock-alt"></i>
                                        <input type="password" name="new_password" placeholder="New Password">
                                        </div>
                                        </div>
                                        <div class="col-xl-4">
                                        <div class="wsus__dash_pro_single">
                                        <i class="fas fa-lock-alt"></i>
                                        <input type="password" name="new_password_confirmation" placeholder="Confirm Password">
                                        </div>
                                        </div>
                                        <div class="col-xl-12">
                                        <button class="common_btn" type="submit">upload</button>
                                        </div>
                                        </div>
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