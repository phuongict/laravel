<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'user_permissions';
    protected $fillable = [
        'user_id',
        'permission_id',
        'updated_at',
        'created_at'
    ];

    
}
