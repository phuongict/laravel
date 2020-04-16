<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $fillable = ['id', 'name', 'slug', 'description', 'image', 'keywords', 'created_by', 'updated_by', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function products(){
        return $this->hasMany(Product::class, 'product_category_id', 'id');
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
