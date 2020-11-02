<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'array',
    ];

    public function sets()
    {
        return $this->hasMany('App\Models\Set');
    }

    // Get the current user role as an array and compare it with the provided $roles.
    public function hasRole($roles)
    {
        $roles = explode(',', str_replace("'", "", $roles));
        foreach ($roles as $val) {
            if (in_array($val, $this->role)) {
                return true;
            }
        }
        return false;
    }
}
