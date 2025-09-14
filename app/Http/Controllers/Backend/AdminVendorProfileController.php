<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use App\Traits\ImageUploadTrait;
use App\Http\Requests\Admin\VendorProfile\AdminVendorProfileRequest;
class AdminVendorProfileController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendor = Vendor::where('user_id', Auth::id())->first();
        if(!$vendor){
            return redirect()->route('admin.dashboard')->with('error', 'You are not a vendor');
        }
        return view('admin.vendor_profile.index', compact('vendor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminVendorProfileRequest $request, string $id)
{
    $admin_vendor = Vendor::findOrFail($id);

    if ($request->hasFile('banner')) {
        $bannerPath = $this->updateImage($request, 'banner', 'admin/admin_vendor/banners', $admin_vendor->banner);
    } else {
        $bannerPath = $admin_vendor->banner;
    }

    $admin_vendor->update([
        'banner'     => $bannerPath,
        'phone'      => $request->phone,
        'address'    => $request->address,
        'description'=> $request->description,
        'fb_link'    => $request->fb_link,
        'tw_link'    => $request->tw_link,
        'insta_link' => $request->insta_link,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
