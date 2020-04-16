<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Repositories\PermissionRepository;
use App\Traits\TreeNode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Http\Requests\Backends\MenuRequest;
class MenuController extends Controller
{
    use TreeNode;
    private $menuRepository;
    private $permissionRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.menu.index',
        'create' => 'backend.menu.create',
        'store' => 'backend.menu.store',
        'edit' => 'backend.menu.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.menus.index',
        'create' => 'backends.menus.create',
        'edit' => 'backends.menus.edit',
        'delete' => 'backends.menus.delete',
        'sort-menu' => 'backends.menus.sort-menu',
    ];

    public function __construct(
        MenuRepository $menuRepository,
        MessageBag $messageBag,
        PermissionRepository $permissionRepository
    )
    {
        $this->messageBag = $messageBag;
        $this->menuRepository = $menuRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(MenuRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => 'menu']));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('menu.menu')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->menuRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('menu.create_menu'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('menu.menu')
        ]);

        $tree = [];
        $this->getParent($this->permissionRepository->all(['id', 'name', 'parent']), $tree, '', old('parent'));
        $this->viewParams['listPermission'] = implode('', $tree);

        $tree = [];
        $this->getParent($this->menuRepository->all(['id', 'name', 'parent']), $tree, '', old('parent'));
        $this->viewParams['listMenu'] = implode('', $tree);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(MenuRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->menuRepository->create($request->except('_token'));
            });
        } catch (\Exception $e) {
            echo '<pre>'.__FILE__.'::'.__METHOD__.'('.__LINE__.')<br>';
                print_r($e->getMessage());
            echo '</pre>';
            die();
            $this->messageBag->add('errors', trans('all.create_error', ['name' => 'menu']));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => 'menu']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('menu.edit_menu'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('menu.menu')
        ]);
        $this->viewParams['objItem'] = $this->menuRepository->find($id);
        $tree = [];
        $this->getParent(
            $this->menuRepository->all(['id', 'name', 'parent']),
            $tree,
            '',
            old('parent')??$this->viewParams['objItem']->parent,
            $id
        );
        $this->viewParams['listMenu'] = implode('', $tree);

        $tree = [];
        $this->getParent(
            $this->permissionRepository->all(['id', 'name', 'parent']),
            $tree,
            '',
            old('permission_id')??$this->viewParams['objItem']->permission_id
        );
        $this->viewParams['listPermission'] = implode('', $tree);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(MenuRequest $request, $id)
    {
        try {
            $this->menuRepository->update($id, $request->except('_token'));
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => 'menu']));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => 'menu']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('menu.delete_menu'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('menu.menu')
        ]);
        $this->viewParams['objItem'] = $this->menuRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(MenuRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'menu']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'menu']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        try{
            $this->menuRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'menu']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.delete_success', ['name' => 'menu']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function sortMenu(MenuRequest $request){
        $this->setTitle(trans('menu.sort_menu'));
        $this->setBreadcrumb([
            '_action' => 'sortMenu',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('menu.menu')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->menuRepository->paginateCustom($request->input());
        return view($this->viewPaths['sort-menu'], $this->viewParams);
    }

    public function getAllItemMenu(MenuRequest $request){
        return response()->json(
            $this->menuRepository
                ->allWhere([['location', $request->input('location')]])
                ->sortBy('order')
                ->values(),
            200
        );
    }
    public function updateSortMenu(MenuRequest $request){
        if(!$request->filled('params')){
            return response()->json([
                'errors' => [trans('menu.error_sort_menu')]
            ], 422);
        }
        $params = $request->input('params');
        try{
            $this->breakArray($params);
        }
        catch (\Exception $exception){
            return response()->json([
                'errors' => [$exception->getMessage()]
            ], 422);
        }
        return response()->json([
            'success' => [trans('menu.sort_success')]
        ], 200);

    }
    public function breakArray($params, $parent = 0)
    {
        foreach($params as $key => $value) {
            if(array_key_exists('children', $value)){
                $this->breakArray($value['children'], $value['id']);
            }
            try{
                $this->menuRepository->update($value['id'], [
                    'parent' => $parent,
                    'order' => ($key + 1)
                ]);
            }
            catch (\Exception $exception){
                throw new \Exception(trans('menu.error_sort_menu'));
            }

        }
    }
}
