<?php

namespace App\Http\Controllers\Frontends;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SlideRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\PostRepository;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $postRepository;
    private $productRepository;
    private $slideRepository;
    private $productCategoryRepository;

    public function __construct(
        PostRepository $postRepository,
        ProductRepository $productRepository,
        SlideRepository $slideRepository,
        ProductCategoryRepository $productCategoryRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->productRepository = $productRepository;
        $this->slideRepository = $slideRepository;
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function index() : View
    {
        $this->setTitle('Nông sản Mộc Châu | Đặc sản Tây Bắc');

        $this->viewParams['newPostLists'] = $this->postRepository->getOrderLimit(
            ['id', 'title', 'slug', 'image', 'short_content', 'category_id'],
            'created_at',
            'desc',
            3
        );

        //slide
        $this->viewParams['sliders'] = $this->slideRepository->getSlide();
        $this->viewParams['categories'] = $this->productCategoryRepository->all();

        $this->viewParams['allProducts'] = $this->productRepository->getProduct();
        $this->viewParams['fruits'] = $this->productRepository->getProductByCategory(4);
        $this->viewParams['vegetables'] = $this->productRepository->getProductByCategory(5);
        $this->viewParams['breads'] = $this->productRepository->getProductByCategory(6);
        $this->viewParams['others'] = $this->productRepository->getProductByCategory(7);
        $this->viewParams['featureProducts'] = $this->productRepository->getProductFeature();
        $this->viewParams['sales'] = $this->productRepository->getProductSale();
        $this->viewParams['disabled_breadcrumb'] = 1;//disabled breadcrumb
        return view('frontends.home.index', $this->viewParams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
