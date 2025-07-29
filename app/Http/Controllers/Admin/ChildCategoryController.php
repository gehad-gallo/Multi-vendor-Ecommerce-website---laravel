<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\ChildCategoryDataTable;
use App\Models\ChildCategory;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Requests\Admin\ChildCategory\ChildCategoryRequest;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.child_categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all()->where('status', 1);
        $sub_categories = SubCategory::all();
        return view('admin.child_categories.create', compact('categories', 'sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildCategoryRequest $request)
    {
        $child_category = ChildCategory::create([
            'name'          =>$request->name,
            'category_id'   =>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'status'         =>$request->status,
        ]);

        return redirect()->route('admin.child-category.index')->with('success', 'Child Category creaed successfully!');
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
        $categories = Category::where('status', 1)->get();
        $sub_categories =  SubCategory::all();
        $child_category = ChildCategory::findOrFail($id);
        return view('admin.child_categories.edit', compact('child_category', 'sub_categories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChildCategoryRequest $request, string $id)
    {
       // dd($request->all());
       $child_category = ChildCategory::findOrFail($id);
        $child_category->update([
            'name'            =>$request->name,
            'category_id'     =>$request->category_id,
            'sub_category_id' =>$request->sub_category_id,
            'status'          =>$request->status,
        ]);

        
        return redirect()->route('admin.child-category.index')->with('success', 'Child Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $child_category = ChildCategory::findOrFail($id);
        $child_category->delete();
        return redirect()->route('admin.child-category.index')->with('success', 'Child Category deleted successfully!');
    }


    public function changeStatus(Request $request){

        $child_category = ChildCategory::findOrFail($request->id);
        $child_category->status = $request->isChecked;
        $child_category->save();

        return response()->json([
            'success' => true,
            'status' => $child_category->status,
            'message' => 'Status updated successfully',
            
        ]);
    }

    public function get_sub_categories($categoryId){
        $subCategories = SubCategory::where('category_id', $categoryId)->get();
        return response()->json($subCategories);
    }

}
