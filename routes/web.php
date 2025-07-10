<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Vendor\DashboardController as VendorDashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\Vendor\VendorProfileController;
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
/*
Route::get('/', function () {
    return view('front_end.home.home');
});

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

    $user = \App\Models\User::find(30);     //vendor 1
    $user->assignRole('vendor');


    //$user = User::find(23);
    //$user->assignRole('admin');
    dd('done');
});

// Admin login 
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'show'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'postLogin'])->name('admin.post.login');
});

// Admin dashboard
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminLoginController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/profile', [AdminProfileController::class, 'index'])->name('show.admin.info');
    Route::get('/edit/profile', [AdminProfileController::class, 'edit'])->name('edit.admin.info');
    Route::post('/edit/profile', [AdminProfileController::class, 'udpateAdminInfo'])->name('update.admin.info');
    Route::post('/edit/password', [AdminProfileController::class, 'updateAdminPassword'])->name('update.admin.password');
});


// Front End routes
Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


// Vendor dashboard
Route::middleware(['auth', 'role:vendor'])->prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');
    Route::post('/logout', [VendorDashboardController::class, 'logout'])->name('vendor.logout');
    
    Route::get('/profile', [VendorProfileController::class, 'index'])->name('vendor.profile');
    Route::get('/profile/edit', [VendorProfileController::class, 'edit'])->name('vendor.profile.edit');
    Route::post('profile/update', [VendorProfileController::class, 'updateVendorInfo'])->name('vendor.profile.update');
    route::post('profile/password-update', [VendorProfileController::class, 'updatVendorPassword'])->name('vendor.password.update');
});

// User dashboard
Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('/logout', [UserDashboardController::class, 'logout'])->name('user.logout');

    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])-> name('user.profile.edit');
    Route::post('/profile/update', [UserProfileController::class, 'updateUserInfo'])-> name('user.profile.update');
    Route::post('/profile/password-update', [UserProfileController::class, 'updateUserPassword'])->name('user.password.update');
});