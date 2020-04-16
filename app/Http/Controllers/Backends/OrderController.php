<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Http\Requests\Backends\OrderRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class OrderController extends Controller
{

    private $orderRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.order.index',
        'create' => 'backend.order.create',
        'store' => 'backend.order.store',
        'show' => 'backend.order.show',
        'edit' => 'backend.order.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.order.index',
        'create' => 'backends.order.create',
        'show' => 'backends.order.show',
        'edit' => 'backends.order.edit',
        'delete' => 'backends.order.delete',
        'detail' => 'backends.order.detail',
    ];

    public function __construct(
        OrderRepository $orderRepository,
        MessageBag $messageBag
    )
    {
        $this->orderRepository = $orderRepository;
        $this->messageBag = $messageBag;
    }

    public function index(OrderRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => trans('order.order')]));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('order.order')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->orderRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('order.create_order'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('order.order')
        ]);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(OrderRequest $request)
    {
        $params = $request->except('_token');
        try {
            $this->orderRepository->create($params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.create_error', ['name' => trans('order.order')]));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => trans('order.order')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('order.edit_order'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('order.order')
        ]);
        $this->viewParams['objItem'] = $this->orderRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(OrderRequest $request, $id)
    {
        $objOrder = $this->orderRepository->find($id);
        $params = $request->except('_token');
        try {
            $this->orderRepository->update($id, $params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => trans('order.order')]));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => trans('order.order')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('order.delete_order'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('order.order')
        ]);
        $this->viewParams['objItem'] = $this->orderRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(OrderRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('order.order')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('order.order')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $objOrder = $this->orderRepository->find($id);
        if($objOrder->products->count()>0){
            $this->messageBag->add('errors', trans('order.has_post', ['name' => trans('order.order')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        try{
            $this->orderRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => trans('order.order')]));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.delete_success', ['name' => trans('order.order')]));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }
    public function changeStatus(OrderRequest $request, $id)
    {
        if (!$request->filled('status'))
        {
            return response()->json([
                'errors' => array(trans('all.is_required', ['name' => 'status']))
            ], 422);
        }
        $findPost = $this->orderRepository->find($id, ['id']);
        if (empty($findPost))
        {
            return response()->json([
                'errors' => array(trans('all.not_found', ['name' => 'id', 'value' => $id]))
            ], 422);
        }
        try {
            $params['status'] = $request->input('status');
            $this->orderRepository->update($id, $params);
        }
        catch (\Exception $exception) {
            return response()->json([
                'errors' => array(trans('all.update_fail', ['name' => 'status']))
            ], 422);
        }

        return response()->json([
            'success' => array(trans('user.update_success', ['name' => 'status']))
        ], 200);
    }

    public function orderDetail($order_id){

        $this->setTitle(trans('order.order_detail', ['code' => $order_id]));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('order.order')
        ]);
        $findOrder = $this->orderRepository->find($order_id);
        if(empty($findOrder)){
            $this->messageBag->add('errors', trans('order.not_found_order', ['code' => $order_id]));
            return redirect()->route($this->routeNames['index'])
                ->withErrors($this->messageBag);
        }

        $this->viewParams['objItem'] = $findOrder;

        return view($this->viewPaths['detail'], $this->viewParams);
    }
}
