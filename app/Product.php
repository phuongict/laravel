<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'id', 'product_code', 'name', 'slug', 'product_description', 'description', 'keywords',
        'product_category_id', 'unit_id', 'price', 'discount',
        'product_info', 'image', 'gallery', 'status', 'featured', 'created_by', 'updated_by',
        'created_at', 'updated_at'
    ];

    public function productCategory(){
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function orders(){
        return $this->belongsToMany(Product::class, 'order_details');
    }

    public function paginateCustom(array $where = array()){
        $query = $this->select($this->fillable);
        if(array_key_exists('product_code', $where) && $where['product_code'] != '')
            $query->where('product_code', $where['product_code']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('name', 'like', '%'.$where['name'].'%');
        return $query->with(['productCategory', 'user', 'unit'])->paginate(config('app.perPage'));
    }
}
