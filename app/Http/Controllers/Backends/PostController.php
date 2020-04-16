<?php

namespace App\Http\Controllers\Backends;

use App\Category;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Http\Requests\Backends\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class PostController extends Controller
{

    private $postRepository;
    private $categoryRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.post.index',
        'create' => 'backend.post.create',
        'store' => 'backend.post.store',
        'show' => 'backend.post.show',
        'edit' => 'backend.post.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.posts.index',
        'create' => 'backends.posts.create',
        'show' => 'backends.posts.show',
        'edit' => 'backends.posts.edit',
        'delete' => 'backends.posts.delete',
    ];

    public function __construct(
        PostRepository $postRepository,
        Category $categoryRepository,
        MessageBag $messageBag
    )
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->messageBag = $messageBag;
    }

    public function index(PostRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => 'posts']));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('post.post')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->postRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('post.create_post'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('post.post')
        ]);
        $this->viewParams['listCategory'] = $this->categoryRepository->all(['id', 'name']);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(PostRequest $request)
    {
        if(!$request->hasFile('image') || !$request->file('image')->isValid()){
            $this->messageBag->add('errors', trans('post.error_upload_file'));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $pathFile = $this->saveImageFile($request->file('image'), config('app.path_post_image'));
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['created_by'] = $params['updated_by'] = auth()->id();
        try {
            $this->postRepository->create($params);
        } catch (\Exception $e) {
            echo $e->getMessage();
            die();
            $this->messageBag->add('errors', trans('all.create_error', ['name' => 'post']));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => 'post']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('post.edit_post'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('post.post')
        ]);
        $this->viewParams['listCategory'] = $this->categoryRepository->all(['id', 'name']);
        $this->viewParams['objItem'] = $this->postRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(PostRequest $request, $id)
    {
        $objPost = $this->postRepository->find($id);
        $pathFile = $objPost->image;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $pathFile = $this->saveImageFile($request->file('image'), config('app.path_post_image'));
            if(Storage::disk('public')->exists($objPost->image))
                Storage::disk('public')->delete($objPost->image);
        }
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['updated_by'] = auth()->id();
        try {
            $this->postRepository->update($id, $params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => 'post']));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => 'post']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('post.delete_post'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('post.post')
        ]);
        $this->viewParams['objItem'] = $this->postRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(PostRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'post']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'post']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $objPost = $this->postRepository->find($id);
        try{
            $this->postRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'post']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if(Storage::disk('public')->exists($objPost->image))
            Storage::disk('public')->delete($objPost->image);
        $this->messageBag->add('success', trans('all.delete_success', ['name' => 'post']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
    public function changeStatus(PostRequest $request, $id)
    {
        if (!$request->filled('status') && !$request->filled('featured'))
        {
            return response()->json([
                'errors' => array(trans('all.is_required', ['name' => 'status']))
            ], 422);
        }
        $findPost = $this->postRepository->find($id, ['id']);
        if (empty($findPost))
        {
            return response()->json([
                'errors' => array(trans('all.not_found', ['name' => 'id', 'value' => $id]))
            ], 422);
        }
        try {
            $params = [];
            if($request->filled('status'))
                $params['status'] = !$request->input('status');
            if($request->filled('featured'))
                $params['featured'] = !$request->input('featured');
            $this->postRepository->update($id, $params);
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
