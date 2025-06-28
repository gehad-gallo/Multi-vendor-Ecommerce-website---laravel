<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminProfileController extends Controller
{
    public function index(){
        $admin = auth()->user();
        //dd($admin);
        return view('admin.profile.index', compact('admin'));
    }


    public function udpateAdminInfo(Request $request){
        //dd($request->all());
        
        $admin = User::findOrFail($request->id);
        dd($admin);
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phone = $request->phone;

        //User::update
    }
}
