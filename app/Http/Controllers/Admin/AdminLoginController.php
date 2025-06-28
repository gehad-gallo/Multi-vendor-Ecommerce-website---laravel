<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminLoginController extends Controller
{
    public function show(){
        return view('admin.login');
    }


    public function postLogin(LoginRequest $request){
        


        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Only admins can login here.',
            ]);
        }

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    return back()->withErrors(['email' => 'Invalid credentials.']);

    }

    public function adminLogout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
