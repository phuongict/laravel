<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function hasPermissionInRole(Permission $permission){
        if(!!optional(optional($this->role)->permissions)->contains($permission) === false){
            return $this->hasPermission($permission);
        }
        return true;
    }

    public function hasPermission(Permission $permission){
        return !!optional($this->permissions)->contains($permission);
    }

    public function isSuperAdmin(){
        return $this->id === 1;
    }
}
