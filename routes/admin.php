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


Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
Route::get('/logout', [AdminLoginController::class, 'adminLogout'])->name('logout');

Route::get('/profile', [AdminProfileController::class, 'index'])->name('show.info');
Route::get('/edit/profile', [AdminProfileController::class, 'edit'])->name('edit.info');
Route::post('/edit/profile', [AdminProfileController::class, 'udpateAdminInfo'])->name('update.info');
Route::post('/edit/password', [AdminProfileController::class, 'updateAdminPassword'])->name('update.password');


// slider routes
Route::resource('slider', SliderController::class);


// Categories routes
Route::put('/category/change-status', [CategoryController::class, 'changeStatus'])->name('category.change.status');
Route::resource('category', CategoryController::class);

// SubCategory routes
Route::put('/sub-category/change-status', [SubCategoryController::class, 'changeStatus'])->name('sub_category.change.status');
Route::resource('sub-category', SubCategoryController::class);