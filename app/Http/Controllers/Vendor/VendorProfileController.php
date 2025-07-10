<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UpdatePasswordRequest;

class VendorProfileController extends Controller
{
    public function index(){
        $vendor = auth()->user();
       // dd($vendor->toArray());
        return view('vendor.profile', compact('vendor'));
    }


    public function edit(){
        $vendor = auth()->user();
        return view('vendor.edit_profile', compact('vendor'));
    }


    public function updateVendorInfo(UpdateProfileRequest $request){
        //dd($request->all());
        $vendor = auth()->user();
        $user_name = $request->first_name . ' ' . $request->last_name;
        $path = $vendor->image;

        if ($request->hasFile('image')){
            if ($vendor->image && file_exists(public_path($vendor->image))){
                unlink(public_path($vendor->image));
            }
            $image = $request->file('image');
            $image_name = Str::slug($vendor->name) . '-' . $vendor->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/vendors/'), $image_name);
            $path = '/uploads/vendors/' .$image_name;
        }
        $vendor->update([
            'name'       => $request->first_name,
            'user_name'  => $user_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'image'      => $path,
        ]);

        return redirect()->route('vendor.profile')->with('success', 'Your info updated successfully.');
    }



    public function updatVendorPassword(UpdatePasswordRequest $request){
        $vendor = auth()->user();
        $vendor->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect()->route('vendor.profile')->with('success', 'Password changed successfully.');
    }
}
