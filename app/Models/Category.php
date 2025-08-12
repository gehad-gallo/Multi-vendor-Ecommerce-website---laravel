<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\ChildCategory;
class Category extends Model
{
    protected $fillable = ['name', 'image', 'slug', 'icon', 'status'];
    use HasFactory;


    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id'); 
    }


    
    public function child_categories() {
        return $this->hasManyThrough(
            ChildCategory::class,
            subCategory::class,
            'category_id',      // FK in sub_categories
            'sub_category_id',  // FK in child_categories
            'id',               // PK in categories
            'id'                // PK in sub_categories
        );
    }

}
