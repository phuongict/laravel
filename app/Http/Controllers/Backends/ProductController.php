<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Http\Requests\Backends\ProductRequest;
use App\Repositories\UnitRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class ProductController extends Controller
{

    private $productRepository;
    private $productCategoryRepository;
    private $unitRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.product.index',
        'create' => 'backend.product.create',
        'store' => 'backend.product.store',
        'show' => 'backend.product.show',
        'edit' => 'backend.product.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.product.index',
        'create' => 'backends.product.create',
        'show' => 'backends.product.show',
        'edit' => 'backends.product.edit',
        'delete' => 'backends.product.delete',
    ];

    public function __construct(
        ProductRepository $productRepository,
        ProductCategoryRepository $productCategoryRepository,
        UnitRepository $unitRepository,
        MessageBag $messageBag
    )
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->unitRepository = $unitRepository;
        $this->messageBag = $messageBag;
    }

    public function index(ProductRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => trans('product.product')]));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product.product')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->productRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('product.create_product'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product.product')
        ]);
        $this->viewParams['listCategory'] = $this->productCategoryRepository->all(['id', 'name']);
        $this->viewParams['listUnit'] = $this->unitRepository->all(['id', 'name']);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(ProductRequest $request)
    {
        if(!$request->hasFile('image') || !$request->file('image')->isValid()){
            $this->messageBag->add('errors', trans('product.error_upload_file'));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $gallery = [];
        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $value){
                $gallery[] = $this->saveImageFile($value, config('app.path_product_gallery'));
            }
        }
        $pathFile = $this->saveImageFile($request->file('image'), config('app.path_product_image'));
        $params = $request->except('_token');
        $params['price'] = str_replace(',', '', $params['price']);
        $params['image'] = $pathFile;
        $params['gallery'] = !empty($gallery)?serialize($gallery):null;
        $params['created_by'] = $params['updated_by'] = auth()->id();
        try {
            $this->productRepository->create($params);
        } catch (\Exception $e) {
            echo $e->getMessage();die();
            $this->messageBag->add('errors', trans('all.create_error', ['name' => 'product']));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => 'product']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('product.edit_product'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product.product')
        ]);
        $this->viewParams['listCategory'] = $this->productCategoryRepository->all(['id', 'name']);
        $this->viewParams['listUnit'] = $this->unitRepository->all(['id', 'name']);
        $this->viewParams['objItem'] = $this->productRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(ProductRequest $request, $id)
    {
        $objProduct = $this->productRepository->find($id);
        $pathFile = $objProduct->image;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $pathFile = $this->saveImageFile($request->file('image'), config('app.path_product_image'));
        }
        $gallery = [];
        if($request->hasFile('gallery')){
            foreach($request->file('gallery') as $value){
                $gallery[] = $this->saveImageFile($value, config('app.path_product_gallery'));
            }
        }
        $params = $request->except('_token');
        $params['price'] = str_replace(',', '', $params['price']);
        $params['image'] = $pathFile;
        $params['gallery'] = !empty($gallery)?serialize($gallery):$objProduct->gallery;
        $params['updated_by'] = auth()->id();
        try {
            $this->productRepository->update($id, $params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => 'product']));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if(!empty($gallery) && $objProduct->gallery != null){
            foreach(unserialize($objProduct->gallery) as $image){
                if(Storage::disk('public')->exists($image))
                    Storage::disk('public')->delete($image);
            }
        }
        if($request->hasFile('image') && $request->file('image')->isValid()){
            if(Storage::disk('public')->exists($objProduct->image))
                Storage::disk('public')->delete($objProduct->image);
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => 'product']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('product.delete_product'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product.product')
        ]);
        $this->viewParams['objItem'] = $this->productRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(ProductRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'product']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'product']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $objProduct = $this->productRepository->find($id);
        try{
            $this->productRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'product']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if(Storage::disk('public')->exists($objProduct->image))
            Storage::disk('public')->delete($objProduct->image);
        $this->messageBag->add('success', trans('all.delete_success', ['name' => 'product']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
    public function changeStatus(ProductRequest $request, $id)
    {
        if (!$request->filled('status'))
        {
            return response()->json([
                'errors' => array(trans('all.is_required', ['name' => 'status']))
            ], 422);
        }
        $findPost = $this->productRepository->find($id, ['id']);
        if (empty($findPost))
        {
            return response()->json([
                'errors' => array(trans('all.not_found', ['name' => 'id', 'value' => $id]))
            ], 422);
        }
        try {
            $params['status'] = $request->input('status');
            $this->productRepository->update($id, $params);
        }
        catch (\Exception $exception) {
            return response()->json([
                'errors' => array(trans('all.update_fail', ['name' => 'status']))
            ], 422);
        }

        return response()->json([
            'errors' => array(trans('user.update_success', ['name' => 'status']))
        ], 200);
    }
    public function changeFeature(ProductRequest $request, $id)
    {
        if (!$request->filled('featured'))
        {
            return response()->json([
                'errors' => array(trans('all.is_required', ['name' => 'status']))
            ], 422);
        }
        $findPost = $this->productRepository->find($id, ['id']);
        if (empty($findPost))
        {
            return response()->json([
                'errors' => array(trans('all.not_found', ['name' => 'id', 'value' => $id]))
            ], 422);
        }
        try {
            $params['featured'] = !$request->input('featured');
            $this->productRepository->update($id, $params);
        }
        catch (\Exception $exception) {
            return response()->json([
                'errors' => array(trans('all.update_fail', ['name' => 'status']))
            ], 422);
        }

        return response()->json([
            'errors' => array(trans('user.update_success', ['name' => 'status']))
        ], 200);
    }
}
