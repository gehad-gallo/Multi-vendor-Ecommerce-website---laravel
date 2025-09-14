<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\DataTables\ProductDataTable;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use App\Models\ChildCategory;
use App\Http\Requests\Admin\Products\ProductCreateRequest;
class ProductController extends Controller
{    
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.products.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories', 'brands'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
       //dd($request->all());
       // dd(auth()->user()->isVendor());
        try{
            $image_path = $this->uploadImage($request, 'thumb_image', 'admin/product');
            //create product
            $vendor = Vendor::where('user_id', auth()->id())->first();

            Product::create([
                'thumb_image'      =>$image_path,
                'name'             =>$request->name,
                'category_id'      =>$request->category_id,
                'sub_category_id'  =>$request->sub_category_id,
                'child_category_id'=>$request->child_category_id,
                'status'           =>$request->status,
                'brand_id'            =>$request->brand_id,
                'sku'              =>$request->sku,
                'price'            =>$request->price,
                'offer_price'      =>$request->offer_price,
                'offer_start_date' =>$request->offer_start_date,
                'offer_end_date'   =>$request->offer_end_date,
                'qty'              =>$request->qty,
                'video_link'       =>$request->video_link,
                'short_description' =>$request->short_description,
                'long_description'  =>$request->long_description,
                'is_featured'       =>$request->is_featured,
                'is_best'           =>$request->is_best,
                'is_top'            =>$request->is_top,
                'seo_title'         =>$request->seo_title,
                'seo_description'   =>$request->seo_description,
                'vendor_id'         =>$vendor->id,
            ]);
            return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
        }catch(\Eception $e){
            Log::error('Product creation failed: ' . $e->getMessage());
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
    
    public function get_sub_categories($categoryId)
    {
        $subCategories = SubCategory::where('category_id', $categoryId)->where('status', 1)->get();
        return response()->json($subCategories);
    }

    public function get_child_category($subCategoryId)
    {
        $childCategories = ChildCategory::where('sub_category_id', $subCategoryId)->where('status', 1)->get();
        return response()->json($childCategories);
    }
}
