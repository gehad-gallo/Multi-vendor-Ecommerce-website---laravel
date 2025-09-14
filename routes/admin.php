<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\ProductController;

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::get('/logout', [AdminLoginController::class, 'adminLogout'])->name('logout');

Route::get('/profile', [AdminProfileController::class, 'index'])->name('show.info');
Route::get('/edit/profile', [AdminProfileController::class, 'edit'])->name('edit.info');
Route::post('/edit/profile', [AdminProfileController::class, 'udpateAdminInfo'])->name('update.info');
Route::post('/edit/password', [AdminProfileController::class, 'updateAdminPassword'])->name('update.password');


// Admin-Vendor pofile routes
Route::resource('vendor-profile', AdminVendorProfileController::class);

// slider routes
Route::resource('slider', SliderController::class);


// Brands routes
Route::put('/brands/change-status', [BrandController::class, 'changeStatus'])->name('brands.change.status');
Route::resource('brands', BrandController::class);

// Products routes
Route::get('/products/get-sub-categories/{category_id}', [ProductController::class, 'get_sub_categories'])->name('products.get.sub.categories');
Route::get('/products/get-child-category/{sub_category_id}', [ProductController::class, 'get_child_category'])->name('products.get.child_category');
Route::get('/product/change-status', [ProductController::class, 'changeStatus'])->name('product.change.status');
Route::resource('products', ProductController::class);

// Categories routes
Route::put('/category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change.status');
Route::resource('category', CategoryController::class);

// SubCategory routes
Route::put('/sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub_category.change.status');
Route::resource('sub-category', SubCategoryController::class);

// Child-Category routes 
Route::get('/child-category/get-sub-categories/{category_id}', [ChildCategoryController::class, 'get_sub_categories'])->name('child_category.get_sub_categories');
Route::put('/child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child_category.change.status');
Route::resource('child-category', ChildCategoryController::class);


