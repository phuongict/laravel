<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    private $table_order_detail = 'order_details';
    protected $fillable = [
        'id', 'status', 'first_name', 'last_name', 'email', 'phone',
        'city_province_id', 'district_id', 'village_id', 'created_by',
        'updated_by', 'address', 'payment', 'ship', 'note', 'created_at', 'updated_at'
    ];

    public function cityProvince(){
        return $this->belongsTo(CityProvince::class, 'city_province_id', 'id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function village(){
        return $this->belongsTo(Village::class, 'village_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')
            ->withPivot('price', 'discount', 'quantity')->withTimestamps();
    }

    public function paginateCustom(array $where = array()){
        $query = $this->select($this->fillable);
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('name', $where) && $where['name'] != '')
            $query->where('first_name', 'like', '%'.$where['name'].'%');
        return $query->with(['cityProvince', 'district', 'village', 'products'])->paginate(config('app.perPage'));
    }

    public function orderDetail($id)
    {
//        $query = $this->select(array_merge($this->fillable, ['']))
    }
}
