<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\SubCategoryDataTable;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\SubCategories\StoreSubCategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub_categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.sub_categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        //dd($request->validated());
        $sub_category = SubCategory::create([
            'name'     =>$request->name,
            'slug'     =>$request->slug,
            'icon'     =>$request->icon,
            'category_id'=>$request->category_id,
            'status'   =>$request->status
        ]);
        return redirect()->route('admin.sub-category.index')->with('success', 'Sub-category created successfully!');
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
        $categories = Category::all();
        $sub_category = SubCategory::findOrFail($id);
        return view('admin.sub_categories.edit', compact('sub_category','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->update([
            'name'     =>$request->name,
            'slug'     =>$request->slug,
            'category_id'=>$request->category_id,
            'status'   =>$request->status,
            'icon'     =>$request->icon,
        ]);

        return redirect()->route('admin.sub-category.index')->with('success','Sub-category Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $sub_category->delete();
        return redirect()->route('admin.sub-category.index')->with('success', 'Sub category deleted successfully!');
    }

    public function changeStatus(Request $request){

        $sub_category = SubCategory::findOrFail($request->id);
        $sub_category->status = $request->isChecked;
        $sub_category->save();

        return response()->json([
            'success' => true,
            'status' => $sub_category->status,
            'message' => 'Status updated successfully',
            
        ]);
    }
}
