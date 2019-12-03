<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'id',
        'name',
        'updated_at',
        'created_at'
    ];

    public function users(){
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permissions', 'permission_id', 'role_id');
    }
}
