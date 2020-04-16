<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\ProductCategoryRepository;
use App\Http\Requests\Backends\ProductCategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class ProductCategoryController extends Controller
{

    private $productCategoryRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.product-category.index',
        'create' => 'backend.product-category.create',
        'store' => 'backend.product-category.store',
        'show' => 'backend.product-category.show',
        'edit' => 'backend.product-category.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.product-category.index',
        'create' => 'backends.product-category.create',
        'show' => 'backends.product-category.show',
        'edit' => 'backends.product-category.edit',
        'delete' => 'backends.product-category.delete',
    ];

    public function __construct(
        ProductCategoryRepository $productCategoryRepository,
        MessageBag $messageBag
    )
    {
        $this->productCategoryRepository = $productCategoryRepository;
        $this->messageBag = $messageBag;
    }

    public function index(ProductCategoryRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => trans('product_category.product_category')]));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product_category.product_category')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->productCategoryRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('product_category.create_product_category'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product_category.create_product_category')
        ]);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(ProductCategoryRequest $request)
    {
        if(!$request->hasFile('image') || !$request->file('image')->isValid()){
            $this->messageBag->add('errors', trans('product_category.error_upload_file'));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $pathFile = $this->saveImageFile($request->file('image'), config('app.path_product_category_image'));
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['created_by'] = $params['updated_by'] = auth()->id();
        try {
            $this->productCategoryRepository->create($params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.create_error', ['name' => trans('product_category.product_category')]));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => trans('product_category.product_category')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('product_category.edit_product_category'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product_category.product_category')
        ]);
        $this->viewParams['objItem'] = $this->productCategoryRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(ProductCategoryRequest $request, $id)
    {
        $objProductCategory = $this->productCategoryRepository->find($id);
        $pathFile = $objProductCategory->image;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $pathFile = $this->saveImageFile($request->file('image'), config('app.path_product_category_image'));
            if(Storage::disk('public')->exists($objProductCategory->image))
                Storage::disk('public')->delete($objProductCategory->image);
        }
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['updated_by'] = auth()->id();
        try {
            $this->productCategoryRepository->update($id, $params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => trans('product_category.product_category')]));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => trans('product_category.product_category')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('product_category.delete_product_category'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('product_category.product_category')
        ]);
        $this->viewParams['objItem'] = $this->productCategoryRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(ProductCategoryRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('product_category.product_category')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('product_category.product_category')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $objProductCategory = $this->productCategoryRepository->find($id);
        if($objProductCategory->products->count()>0){
            $this->messageBag->add('errors', trans('product_category.has_product', ['name' => trans('product_category.product_category')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        try{
            $this->productCategoryRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('product_category.product_category')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if(Storage::disk('public')->exists($objProductCategory->image))
            Storage::disk('public')->delete($objProductCategory->image);
        $this->messageBag->add('success', trans('all.delete_success', ['name' => trans('product_category.product_category')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
}
