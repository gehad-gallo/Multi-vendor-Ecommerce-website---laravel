<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        if (auth()->user()->hasRole('user')) {
            return view('front_end.dashboard.dashboard');
        }
    }

    public function logout(){
        auth()->logout();
       // $request->session()->invalidate();
       // $request->session()->regenerateToken();
    
        return redirect()->route('home');
    }
}
