<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Category;

class ChildCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'sub_category_id', 'name', 'status'];

    public function subCategory(){
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    
    public function child_categories()
    {
        return $this->hasMany(ChildCategory::class, 'sub_category_id');
    }
}
