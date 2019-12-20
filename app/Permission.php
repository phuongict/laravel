<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = [
        'id',
        'slug',
        'name',
        'parent',
        'updated_at',
        'created_at'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'user_permissions');
    }

    public function roles(){
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function menus(){
        return $this->hasMany(Menu::class, 'permission_id', 'id');
    }

    public function paginateCustom(array $where = array()){
        $this->setTable($this->table.' as tb1');
        $query = $this->select(
            array_merge(
                $this->fillable,
                [DB::raw("(select name from permissions where id = tb1.parent) as parent_name")]
            )
        );
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('name', 'like', '%'.$where['name'].'%');

        if(array_key_exists('slug', $where) && $where['slug'] != '')
            $query->where('slug', 'like', '%'.$where['slug'].'%');
        return $query->paginate(config('app.perPage'));
    }
}
