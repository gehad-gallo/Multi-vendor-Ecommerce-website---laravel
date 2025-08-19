<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['logo', 'name', 'slug', 'is_featured', 'status'];
    use HasFactory;
}
