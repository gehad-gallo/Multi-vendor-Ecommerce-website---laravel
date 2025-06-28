<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        //if (auth()->user()->hasRole('user')) {
            return view('user.dashboard');
        //}
    }
}
