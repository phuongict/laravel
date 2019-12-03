<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = [
        'id',
        'slug',
        'name',
        'updated_at',
        'created_at'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'user_permissions');
    }

    public function roles(){
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
