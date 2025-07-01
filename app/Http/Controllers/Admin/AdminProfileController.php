<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Http\Requests\Admin\UpdatePasswordRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    public function index(){
        $admin = auth()->user();
        return view('admin.profile.index', compact('admin'));
    }


    public function edit(){
        $admin = auth()->user();
        return view('admin.profile.edit', compact('admin'));
    }


    public function udpateAdminInfo(UpdateAdminRequest $request){
        $admin = User::findOrFail($request->id);
        $user_name = $request->first_name . ' ' . $request->last_name;
    
        $path = $admin->image;  // keep old path by default
    
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($admin->image && file_exists(public_path($admin->image))) {
                unlink(public_path($admin->image));
            }
            // Handle new image upload
            $image = $request->image;
            $image_name = Str::slug($admin->name) . '-' . $admin->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $image_name);
            $path = '/uploads/' . $image_name;
        }
        // Update admin record
        $admin->update([
            'name'       => $user_name,
            'image'      => $path,
            'user_name' => $user_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);
    
        return redirect()->route('show.admin.info')->with('success', 'Admin info updated successfully.');
    }

    

    public function updateAdminPassword(UpdatePasswordRequest $request){
        //dd($request->all());
        $admin = User::findOrFail($request->id);

        // Check current password
        if (!Hash::check($request->current_pass, $admin->password)) {
            return back()->withErrors(['current_pass' => 'Current password is incorrect.']);
        }

        // Update password
        $admin->update([
            'password' => bcrypt($request->new_pass),
        ]);

        //return back()->with('success', 'Password updated successfully.');
        //return rediect()->route('show.admin.info')->flash()->success('Operation completed successfully.');
        return redirect()->route('show.admin.info')->with('success', 'Operation completed successfully.');
        flash()->success('Operation completed successfully.');

    }
    
}
