<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityProvince extends Model
{
    protected $table = 'city_provinces';
    protected $fillable = ['id', 'city_province_code', 'name', 'english_name', 'level', 'created_at', 'updated_at'];

    public function districts(){
        return $this->hasMany(District::class,'city_province_id', 'id');
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
