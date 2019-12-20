<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = [
        'id', 'name', 'value', 'type', 'parent', 'order', 'icon',
        'status', 'location', 'permission_id', 'created_at', 'updated_at'
    ];

    public function permission(){
        return $this->belongsTo(Permission::class, 'permission_id', 'id');
    }
    public function paginateCustom(array $where = array()){
        $this->setTable($this->table.' as tb1');
        $query = $this->select(
            array_merge(
                $this->fillable,
                [DB::raw("(select name from menus where id = tb1.parent) as parent_name")]
            )
        );
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('location', $where) && $where['location'] != '')
            $query->where('location', $where['location']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('name', 'like', '%'.$where['name'].'%');

        return $query->paginate(config('app.perPage'));
    }
}
