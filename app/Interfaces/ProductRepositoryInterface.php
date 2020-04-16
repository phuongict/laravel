<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 10/12/2019
 * Time: 16:45
 */

namespace App\Interfaces;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getProduct();
    public function getProductByCategory(int $category_id);
    public function getProductFeature();
    public function getProductSale();
    public function getRelatedProduct($current_product_id, $category_id);
    public function getPopularProduct();
}
