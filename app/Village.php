<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';
    protected $fillable = ['id', 'village_code', 'name', 'level', 'english_name', 'district_id', 'created_at', 'updated_at'];

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function paginateCustom(array $where = array()){
        $query = $this->select($this->fillable);
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('name', 'like', '%'.$where['name'].'%');
        return $query->with('district')->paginate(config('app.perPage'));
    }
}
