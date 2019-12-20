<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Http\Requests\Backends\RoleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Traits\TreeNode;
use App\Repositories\PermissionRepository;

class RoleController extends Controller
{
    use TreeNode;

    private $roleRepository;
    private $permissionRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.role.index',
        'create' => 'backend.role.create',
        'store' => 'backend.role.store',
        'show' => 'backend.role.show',
        'edit' => 'backend.role.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.roles.index',
        'create' => 'backends.roles.create',
        'show' => 'backends.roles.show',
        'edit' => 'backends.roles.edit',
        'delete' => 'backends.roles.delete',
    ];

    public function __construct(
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository,
        MessageBag $messageBag
    )
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->messageBag = $messageBag;
    }

    public function index(RoleRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => 'role']));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('role.role')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->roleRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('role.create_role'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('role.role')
        ]);

        $listPermissionsRole = collect();
        if(session()->has('_old_input') && !empty(session()->get('_old_input')))
        {
            $oldInput = session()->get('_old_input');
            if(array_key_exists('permissions', $oldInput) && !empty($oldInput['permissions']))
            {
                $listPermissionsRole = $this->permissionRepository->getInArray($oldInput['permissions']);
            }
        }
        $listPermissions = $this->permissionRepository->all();

        $tree = [];
        $this->createTree($listPermissions, $listPermissionsRole, $tree);
        $this->viewParams['tree'] = implode('', $tree);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(RoleRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $result = $this->roleRepository->create($request->except('_token'));
                $this->roleRepository->setPermissions($result, $request->input('permissions'));
            });
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.create_error', ['name' => 'role']));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => 'role']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('role.edit_role'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('role.role')
        ]);
        $this->viewParams['objItem'] = $this->roleRepository->find($id);

        $listPermissionsRole = collect();
        if(session()->has('_old_input') && !empty(session()->get('_old_input')))
        {
            $oldInput = session()->get('_old_input');
            if(in_array('permissions', $oldInput) && !empty($oldInput['permission']))
            {
                $listPermissionsRole = $this->permissionRepository->getInArray($oldInput['permission']);
            }
        }
        else
        {
            $listPermissionsRole = $this->viewParams['objItem']->permissions;
        }
        $listPermissions = $this->permissionRepository->all();

        $tree = [];
        $this->createTree($listPermissions, $listPermissionsRole, $tree);
        $this->viewParams['tree'] = implode('', $tree);

        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(RoleRequest $request, $id)
    {
        $permissions = [];
        if($request->has('permissions'))
            $permissions = $request->input('permissions');
        try {
            DB::transaction(function() use ($id, $request, $permissions){
                $this->roleRepository->update($id, $request->except('_token'));
                $this->roleRepository->setPermissions(
                    $this->roleRepository->find($id),
                    $permissions
                );
            });
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => 'role']));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => 'role']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('role.delete_role'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('role.role')
        ]);
        $this->viewParams['objItem'] = $this->roleRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(RoleRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'role']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'role']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        try{
            $this->roleRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'role']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.delete_success', ['name' => 'role']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
}
