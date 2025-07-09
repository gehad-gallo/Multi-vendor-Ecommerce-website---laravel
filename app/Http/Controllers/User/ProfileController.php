<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Http\Requests\User\UpdatePasswordRequest;
class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        //dd($user);
        return view('front_end.dashboard.profile', compact('user'));
    }


    public function edit(){
        $user = auth()->user();
        return view('front_end.dashboard.edit_profile', compact('user'));
    }


    public function updateUserInfo(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user_name = $request->first_name . ' ' . $request->last_name;

        $path = $user->image; // existing image path

        // Handle new image upload
        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }

            $image = $request->file('image');
            $image_name = Str::slug($user->name) . '-' . $user->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/users/'), $image_name);
            $path = '/uploads/users/' . $image_name;
        }

        // Update user info (always)
        $user->update([
            'name'       => $request->first_name,
            'user_name'  => $user_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'image'      => $path,
        ]);

        return redirect()->route('user.profile')->with('success', 'Your info updated successfully.');
    }




    public function updateUserPassword(UpdatePasswordRequest $request){
        $user = auth()->user();
        $user->update([
            'password'=> bcrypt($request->new_password),
        ]);

        return redirect()->route('user.profile')->with('success', 'Password changed successfully.');
        
    }
}
