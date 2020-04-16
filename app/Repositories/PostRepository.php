<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 10/12/2019
 * Time: 16:43
 */

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Interfaces\PostRepositoryInterface;
use App\Post;
class PostRepository extends Repository implements PostRepositoryInterface
{
    private $post;
    protected $modelClassName = '\\App\\Post';

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getOrderLimit(array $columns = ['*'], $columnOrder = 'created_at', $order = 'asc', $limit){
        return $this->post->select($columns)->orderBy($columnOrder, $order)->take($limit)->with('category')->get();
    }

    public function getPreviousPost($id, $category_id){
        return $this->post->select(['id', 'title', 'slug', 'image'])
            ->where('id', '<', $id)
            ->where('category_id', $category_id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function getNextPost($id, $category_id){
        return $this->post->select(['id', 'title', 'slug', 'image'])
            ->where('id', '>', $id)
            ->where('category_id', $category_id)
            ->first();
    }

    public function getPopularPost(){
        return $this->post->select('id', 'created_at', 'title', 'slug', 'image')
            ->where('featured', 1)
            ->get();
    }
}
