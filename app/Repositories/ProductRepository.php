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
use App\Interfaces\ProductRepositoryInterface;
use App\Order;
use App\Product;
use App\OrderDetail;
use Illuminate\Support\Facades\DB;

class ProductRepository extends Repository implements ProductRepositoryInterface
{
    protected $modelClassName = '\\App\\Product';
    private $product;
    private $orderDetail;

    public function __construct(Product $product, OrderDetail $orderDetail)
    {
        $this->product = $product;
        $this->orderDetail = $orderDetail;
    }

    public function getProduct()
    {
        // TODO: Implement getProduct() method.
        return $this->product->select(['id', 'name', 'slug', 'price', 'discount', 'image'])
            ->where('status', '>', 0)
            ->take(8)
            ->orderBy('created_at', 'desc')->get();
    }
    public function getProductByCategory(int $category_id)
    {
        // TODO: Implement getProduct() method.
        return $this->product->select(['id', 'name', 'slug', 'price', 'discount', 'image'])
            ->where('status', '>', 0)
            ->where('product_category_id', $category_id)
            ->take(8)
            ->orderBy('created_at', 'desc')->get();
    }
    public function getProductFeature(){
        return $this->product->select(['id', 'name', 'slug', 'price', 'discount', 'image'])
            ->where('status', '>', 0)
            ->where('featured', 1)
            ->take(5)
            ->orderBy('created_at', 'desc')->get();
    }
    public function getProductSale(){
        return $this->product->select(['id', 'name', 'slug', 'price', 'discount', 'image'])
            ->where('status', '>', 0)
            ->where('discount', '>', 0)
            ->take(7)
            ->orderBy('created_at', 'desc')->get();
    }
    public function getRelatedProduct($current_product_id, $category_id){
        return $this->product->select(['id', 'name', 'slug', 'price', 'discount', 'image'])
            ->where('status', '>', 0)
            ->where('product_category_id', $category_id)
            ->where('id', '<>',$current_product_id)
            ->take(3)
            ->orderBy('created_at', 'desc')->get();
    }
    public function getPopularProduct(){
        return $this->product->select(['id', 'name', 'slug', 'image', 'price', 'discount', 'total_order'])
            ->join(
                DB::raw("(select product_id, count(product_id) as total_order from order_details group by product_id) as tb2"),
                'tb2.product_id',
                '=',
                'products.id'
            )
            ->where('status', '>', 0)
            ->orderBy('total_order', 'desc')
            ->take(5)
            ->get();
    }
}
