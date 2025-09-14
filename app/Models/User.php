<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_name',
        'image',
        'phone',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



     // Check if user is Admin
     public function isAdmin(): bool
     {
         return $this->hasRole('admin');
     }
 
     // Check if user is Vendor
     public function isVendor(): bool
     {
         return $this->hasRole('vendor');
     }
 
     // Check if user has BOTH roles
     public function isAdminAndVendor(): bool
     {
         return $this->hasAllRoles(['admin', 'vendor']);
     }
 
     // Check if user is just a normal User (no admin/vendor roles)
     public function isUser(): bool
     {
         return $this->hasRole('user');
     }

}
