<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\BrandDataTables;
use App\Http\Requests\Admin\Brands\BrandCreateRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Exception;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\Brands\BrandUpdateRequest;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTables $dataTable)
    {
        return $dataTable->render('admin.brands.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandCreateRequest $request)
    {

        try{
            //upload logo 
            $image_path = $this->uploadImage($request, 'logo', 'admin/brands');

            //create brand
            Brand::create([
                'logo'   => $image_path,
                'name'   => $request->name,
                'slug'   =>$request->slug,
                'status' =>$request->status,
                'is_featured'=>$request->is_featured,
            ]);
            return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully!');

        }catch(\Exception $e){
            Log::error('Brand creation failed: ' . $e->getMessage());
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
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandUpdateRequest $request, string $id)
    {
        //dd($request->all());

        $brand = Brand::findOrFail($id);
        try{
            $logoPath = $this->updateImage($request, 'logo', 'admin/brands', $brand->logo);
            $brand->update([
                'name'    => $request->name,
                'slug'    => $request->slug,
                'logo'    => $logoPath,
                'status'  => $request->status,
                'is_featured'=>$request->is_featured,
            ]);
            
            return redirect()->route('admin.brands.index')->with('success', 'Brand Updated successfully!');

        }catch(\Exception $e){
            Log::error('Brand Edition failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        try{
            $logo = $brand->logo;
            $brand->delete();
            $this->deleteImage($logo);
            return redirect()->route('admin.brands.index')->with('success', 'Brand deleted Successfully!');
        }catch(\Exception $e){
            Log::error('Brand deletion failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    public function changeStatus(Request $request){
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->isChecked;
        $brand->save();
        
        return response()->json([
            'success'   => true,
            'status'    => $brand->status,
            'message'   => 'Status updated successfully!',
        ]);
    }


}
