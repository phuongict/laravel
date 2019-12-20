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
        return $this->belongsToMany(
            Permission::class,
            'role_permissions')
            ->withTimestamps();
    }

    public function paginateCustom(array $where = array()){
        $query = $this->select($this->fillable);
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('name', 'like', '%'.$where['name'].'%');
        return $query->paginate(config('app.perPage'));
    }
}
