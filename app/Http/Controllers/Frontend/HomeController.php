<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->orderBy('serial','asc')->get();
        //$categories = Category::with('sub_categories')->where('status', 1)->get();
        //$child_category = ChildCategory::with('subCategory')->where('status',1)->get();
        //$sub_categories = SubCategory::with('category')->where('status', 1)->get();
        //$categories = Category::with(['sub_categories.child_categories'])->where('status', 1)->get();
        
        $categories = Category::with([
            'sub_categories'=>function($query){
                $query->where('status', 1)
                      ->with(['child_categories' =>function($q){
                        $q->where('status',1);
                      }]);
            }
            ])->where('status',1)->get();


        return view('front_end.home.home', compact('sliders', 'categories'));
    }

}
