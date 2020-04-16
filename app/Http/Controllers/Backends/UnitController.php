<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\UnitRepository;
use App\Http\Requests\Backends\UnitRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class UnitController extends Controller
{

    private $unitRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.unit.index',
        'create' => 'backend.unit.create',
        'store' => 'backend.unit.store',
        'show' => 'backend.unit.show',
        'edit' => 'backend.unit.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.unit.index',
        'create' => 'backends.unit.create',
        'show' => 'backends.unit.show',
        'edit' => 'backends.unit.edit',
        'delete' => 'backends.unit.delete',
    ];

    public function __construct(
        UnitRepository $unitRepository,
        MessageBag $messageBag
    )
    {
        $this->unitRepository = $unitRepository;
        $this->messageBag = $messageBag;
    }

    public function index(UnitRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => trans('unit.unit')]));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('unit.unit')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->unitRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('unit.create_unit'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('unit.unit')
        ]);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(UnitRequest $request)
    {
        $params = $request->except('_token');
        try {
            $this->unitRepository->create($params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.create_error', ['name' => trans('unit.unit')]));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => trans('unit.unit')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('unit.edit_unit'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('unit.unit')
        ]);
        $this->viewParams['objItem'] = $this->unitRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(UnitRequest $request, $id)
    {
        $objUnit = $this->unitRepository->find($id);
        $params = $request->except('_token');
        try {
            $this->unitRepository->update($id, $params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => trans('unit.unit')]));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => trans('unit.unit')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('unit.delete_unit'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('unit.unit')
        ]);
        $this->viewParams['objItem'] = $this->unitRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(UnitRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('unit.unit')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('unit.unit')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $objUnit = $this->unitRepository->find($id);
        if($objUnit->products->count()>0){
            $this->messageBag->add('errors', trans('unit.has_post', ['name' => trans('unit.unit')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        try{
            $this->unitRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('unit.unit')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.delete_success', ['name' => trans('unit.unit')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
}
