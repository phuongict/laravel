<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Http\Requests\Backends\PermissionRequest;
use App\Traits\TreeNode;
use Illuminate\Support\MessageBag;

class PermissionController extends Controller
{
    use TreeNode;
    private $permissionRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.permission.index',
        'create' => 'backend.permission.create',
        'store' => 'backend.permission.store',
        'show' => 'backend.permission.show',
        'edit' => 'backend.permission.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.permissions.index',
        'create' => 'backends.permissions.create',
        'show' => 'backends.permissions.show',
        'edit' => 'backends.permissions.edit',
        'delete' => 'backends.permissions.delete',
    ];

    public function __construct(
        PermissionRepository $permissionRepository,
        MessageBag $messageBag
    )
    {
        $this->permissionRepository = $permissionRepository;
        $this->messageBag = $messageBag;
    }

    public function index(PermissionRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => 'permissions']));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('permission.permission')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->permissionRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('permission.create_permission'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('permission.permission')
        ]);
        $tree = [];
        $this->getParent($this->permissionRepository->all(['id', 'name', 'parent']), $tree, '', old('parent'));
        $this->viewParams['listPermission'] = implode('', $tree);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(PermissionRequest $request)
    {
        try {
            $this->permissionRepository->create($request->except('_token'));
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.create_error', ['name' => 'permission']));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => 'permission']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('permission.edit_permission'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('permission.permission')
        ]);
        $this->viewParams['objItem'] = $this->permissionRepository->find($id);
        $tree = [];
        $this->getParent(
            $this->permissionRepository->all(['id', 'name', 'parent']),
            $tree,
            '',
            old('parent')??$this->viewParams['objItem']->parent,
            $id
        );
        $this->viewParams['listPermission'] = implode('', $tree);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(PermissionRequest $request, $id)
    {
        try {
            $this->permissionRepository->update($id, $request->except('_token'));
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => 'permission']));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => 'permission']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('permission.delete_permission'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('permission.permission')
        ]);
        $this->viewParams['objItem'] = $this->permissionRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(PermissionRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'permission']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'permission']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        try{
            $this->permissionRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'permission']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.delete_success', ['name' => 'permission']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
}
