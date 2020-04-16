<?php

namespace App\Http\Controllers\Frontends;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\ProductCategoryRepository;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    private $productRepository;
    private $productCategoryRepository;
    public function __construct(ProductRepository $productRepository, ProductCategoryRepository $productCategoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
    }
    public function detail($slug, $id){
        $product = $this->productRepository->find($id);
        $this->setTitle($product->name);


        $this->viewParams['_product'] = $product;
        $this->viewParams['categories'] = $this->productCategoryRepository->all(['id', 'name', 'slug']);
        $this->viewParams['popularProducts'] = $this->productRepository->getPopularProduct();
        $this->viewParams['relatedProducts'] = $this->productRepository->getRelatedProduct($product->id, $product->product_category_id);

        return view('frontends.product.detail', $this->viewParams);
    }
}
