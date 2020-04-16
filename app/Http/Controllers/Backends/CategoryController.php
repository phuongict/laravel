<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Backends\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class CategoryController extends Controller
{

    private $categoryRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.category.index',
        'create' => 'backend.category.create',
        'store' => 'backend.category.store',
        'show' => 'backend.category.show',
        'edit' => 'backend.category.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.categories.index',
        'create' => 'backends.categories.create',
        'show' => 'backends.categories.show',
        'edit' => 'backends.categories.edit',
        'delete' => 'backends.categories.delete',
    ];

    public function __construct(
        CategoryRepository $categoryRepository,
        MessageBag $messageBag
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->messageBag = $messageBag;
    }

    public function index(CategoryRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => 'categories']));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('category.category')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->categoryRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('category.create_category'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('category.category')
        ]);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(CategoryRequest $request)
    {
        if(!$request->hasFile('image') || !$request->file('image')->isValid()){
            $this->messageBag->add('errors', trans('category.error_upload_file'));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $pathFile = $this->saveImageFile($request->file('image'), config('app.path_category_image'));
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['created_by'] = $params['updated_by'] = auth()->id();
        try {
            $this->categoryRepository->create($params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.create_error', ['name' => 'category']));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => 'category']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('category.edit_category'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('category.category')
        ]);
        $this->viewParams['objItem'] = $this->categoryRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(CategoryRequest $request, $id)
    {
        $objCategory = $this->categoryRepository->find($id);
        $pathFile = $objCategory->image;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $pathFile = $this->saveImageFile($request->file('image'), config('app.path_category_image'));
            if(Storage::disk('public')->exists($objCategory->image))
                Storage::disk('public')->delete($objCategory->image);
        }
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['updated_by'] = auth()->id();
        try {
            $this->categoryRepository->update($id, $params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => 'category']));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => 'category']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('category.delete_category'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('category.category')
        ]);
        $this->viewParams['objItem'] = $this->categoryRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(CategoryRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'category']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'category']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $objCategory = $this->categoryRepository->find($id);
        if($objCategory->products->count()>0){
            $this->messageBag->add('errors', trans('category.has_post', ['name' => trans('category.category')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        try{
            $this->categoryRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'category']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if(Storage::disk('public')->exists($objCategory->image))
            Storage::disk('public')->delete($objCategory->image);
        $this->messageBag->add('success', trans('all.delete_success', ['name' => 'category']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
}
