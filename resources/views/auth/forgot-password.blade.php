@extends('front_end.layouts.master')

@section('content')

<!--============================
     PASSWORD RESET START
==============================-->
<section id="wsus__login_register">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="wsus__login_reg_area">

                    <!-- Title -->
                    <div class="text-center mb-4">
                        <h4 class="mb-2">Forgot Your Password?</h4>
                        <p class="text-muted">Enter your email and we’ll send you a reset link.</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Form -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="wsus__login_input">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                        </div>

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        <button type="submit" class="common_btn mt-3 w-100">
                            Email Password Reset Link
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}" class="text-decoration-underline">Back to Login</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--============================
     PASSWORD RESET END
==============================-->

@endsection
