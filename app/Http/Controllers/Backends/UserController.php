<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backends\UserRequest;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    private $userRepository;
    private $roleRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.user.index',
        'create' => 'backend.user.create',
        'store' => 'backend.user.store',
        'show' => 'backend.user.show',
    ];
    private $viewPaths = [
        'index' => 'backends.users.index',
        'create' => 'backends.users.create',
        'show' => 'backends.users.show',
        'edit' => 'backends.users.edit',
    ];

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository, MessageBag $messageBag)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->messageBag = $messageBag;
    }
    public function index(UserRequest $request)
    {
        $this->viewParams['_title'] = trans('user.list_users');
        $this->viewParams['breadcrumb'] = [
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ];
        $this->viewParams['requestParams'] = $request->all();

        $this->viewParams['lists'] = $this->userRepository->paginateCustom($this->viewParams['requestParams']);
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->viewParams['_title'] = trans('user.create_user');
        $this->viewParams['breadcrumb'] = [
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ];

        $this->viewParams['listRoles'] = $this->userRepository->all(['id', 'name']);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(UserRequest $request)
    {
        try{
            $this->userRepository->createUser($request->except('_token', 'password_confirmation'));

        }
        catch (\Exception $e){
            $this->messageBag->add('errors', trans('user.create_error'));
            return redirect()->route($this->routeNames['create'])->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('user.create_success'));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function show($id)
    {
        return view('backends.users.show', $this->viewParams);
    }

    public function edit($id)
    {
        $this->viewParams['_title'] = trans('user.create_user');
        $this->viewParams['breadcrumb'] = [
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ];
        $this->viewParams['objItem'] = $this->userRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(UserRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function blockUser(UserRequest $request, $id)
    {
        if (!$request->filled('status'))
        {
            return response()->json([
                    'errors' => array(trans('user.is_required', ['var_name' => 'status']))
                ], 422);
        }
        $findUser = $this->userRepository->find($id, ['id']);
        if (empty($findUser))
        {
            return response()->json([
                'errors' => array(trans('user.not_found', ['name' => 'id', 'value' => $id]))
            ], 422);
        }
        try {
            $this->userRepository->update($id, ['blocked' => !$request->input('status')]);
        }
        catch (\Exception $exception) {
            return response()->json([
                'errors' => array(trans('user.update_fail', ['name' => 'status']))
            ], 422);
        }

        return response()->json([
            'errors' => array(trans('user.update_success', ['name' => 'status']))
        ], 200);
    }
}
