<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id', 'title', 'slug', 'image', 'content', 'short_content', 'description',
        'keywords', 'featured', 'status', 'category_id', 'created_by', 'updated_by',
        'deleted_by', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function paginateCustom(array $where = array()){
        $query = $this->select($this->fillable);
        if(array_key_exists('id', $where) && $where['id'] != '')
            $query->where('id', $where['id']);

        if(array_key_exists('title', $where) && $where['title'] != '')
            $query->where('title', 'like', '%'.$where['title'].'%');
        return $query->with('category')->paginate(config('app.perPage'));
    }
}
