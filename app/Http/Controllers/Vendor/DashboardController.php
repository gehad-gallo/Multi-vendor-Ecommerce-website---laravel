<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        //if (auth()->user()->hasRole('vendor')) {
            return view('vendor.dashboard');
        //}
    }


    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
