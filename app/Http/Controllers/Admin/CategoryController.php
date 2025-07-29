<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\Categories\StoreCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;
use App\Traits\ImageUploadTrait;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Exception;

class CategoryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try{
        // Upload the image
        $imagePath = $this->uploadImage($request, 'image', 'admin/categories');

        // create new category
        Category::create([
            'name'       =>$request->name,
            'image'      =>$imagePath,
            'slug'       =>$request->slug,
            'status'     =>$request->status,
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Category created successfully');
    } catch(\Exception $e) {
        Log::error('Category creation failed: ' . $e->getMessage());
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        try{
            $imagePath = $this->updateImage($request, 'image', 'admin/categories', $category->image);
            $category->update([
                'name'     => $request->name,
                'slug'     => $request->slug,
                'image'    => $imagePath,
                'status'   => $request->status,
            ]);
            return redirect()->route('admin.category.index')->with('success','Category updated successfully');

        }catch(\Exception $e){
            Log::error('Category update failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        try {
            $image = $category->image;
            $category->delete();
            $this->deleteImage($image);
            return redirect()->route('admin.category.index')->with('success', 'Category removed successfully!');
        } catch (Exception $e) {
            return redirect()->route('admin.category.index')->with('error', "Can't be deleted. Category has related sub-categories!");
        }
        
    }



    public function changeStatus(Request $request){
        //dd($request->all());
        $category = Category::findOrFail($request->id);
        $category->status = $request->isChecked;
        $category->save();

        return response()->json([
            'success' => true,
            'status' => $category->status,
            'message' => 'Status updated successfully',
            
        ]);
    }
}
