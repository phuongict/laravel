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
        'id', 'name', 'email', 'password', 'blocked', 'date_blocked', 'created_at', 'updated_at'
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

    public function roles(){
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    public function hasPermissionInRole(Permission $permission){
        if(!$this->roles)
            goto out;
        foreach($this->roles as $role){
            if(!!optional($role->permissions)->contains($permission)){
                return true;
            }
        }
        out:
        return $this->hasPermission($permission);
    }

    public function hasPermission(Permission $permission){
        return !!optional($this->permissions)->contains($permission);
    }

    public function isSuperAdmin(){
        return $this->id === 1;
    }

    public function paginateCustom(array $where = array()){
        $query = $this->select($this->fillable);
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('block', $where) && $where['block'] != '')
            $query->where('blocked', $where['block']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('name', 'like', '%'.$where['name'].'%');

        if(array_key_exists('email', $where) && $where['email'] != '')
            $query->where('email', 'like', '%'.$where['email'].'%');
        return $query->paginate(config('app.perPage'));
    }
}
