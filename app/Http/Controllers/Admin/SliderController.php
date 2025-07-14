<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreSliderRequest;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
       
        try {
            // Upload the image
            $bannerPath = $this->uploadImage($request, 'banner', 'admin/sliders');

            // Create the slider
            Slider::create([
                'banner'         => $bannerPath,
                'type'           => $request->type,
                'title'          => $request->title,
                'starting_price' => $request->starting_price,
                'btn_url'        => $request->btn_url,
                'serial'         => $request->serial,
                'status'         => $request->status,
            ]);

            return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully');

        } catch (\Exception $e) {
            Log::error('Slider creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
