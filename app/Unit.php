<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];

    public function products(){
        return $this->hasMany(Product::class, 'unit_id', 'id');
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
