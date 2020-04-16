<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = [
        'id', 'district_code', 'name', 'english_name',
        'city_province_id', 'level', 'created_at', 'updated_at'
    ];

    public function cityProvince(){
        return $this->belongsTo(CityProvince::class, 'city_province_id', 'id');
    }

    public function villages(){
        return $this->hasMany(Village::class,'district_id', 'id');
    }

    public function paginateCustom(array $where = array()){
        $query = $this->select($this->fillable);
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('name', 'like', '%'.$where['name'].'%');
        return $query->with('cityProvince')->paginate(config('app.perPage'));
    }
}
