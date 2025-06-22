<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Vendor\DashboardController as VendorDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


Route::get('/roles_permissions', function(){
    //Role::create(['name' => 'admin']);  // to create role __ types of users
    //Role::create(['name' => 'vendor']);
    // Role::create(['name' => 'user']);

    //$permission = Permission::create(['name' => 'delete user']);  //to create new permission
    //$role = Role::firstOrCreate(['name' => 'admin']);      // to find  specifeic role
    //$role->givePermissionTo($permission);                  // to assign the permission to the role 
    //$permission->assignRole($role);                         // ...
    //dd('done');


    //$user = \App\Models\User::find(14);
    //$user->assignRole('admin');

    //$user = \App\Models\User::find(15);
    //$user->assignRole('vendor');

    //$user = \App\Models\User::find(16);
    //$user->assignRole('user');


    $user = User::find(23);
    $user->assignRole('admin');
    dd('done');
});

// Admin dashboard
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Vendor dashboard
Route::middleware(['auth', 'role:vendor'])->prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');
});

// User dashboard
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});