<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backends\UserRequest;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\Traits\TreeNode;

class UserController extends Controller
{
    use TreeNode;
    private $userRepository;
    private $roleRepository;
    private $permissionRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.user.index',
        'admincp' => 'backend.index',
        'create' => 'backend.user.create',
        'store' => 'backend.user.store',
        'show' => 'backend.user.show',
        'edit' => 'backend.user.edit',
        'edit-permission' => 'backend.user.edit-permission',
        'change-password-user' => 'backend.user.change-password-user',
        'change-password' => 'backend.user.change-password',
    ];
    private $viewPaths = [
        'index' => 'backends.users.index',
        'create' => 'backends.users.create',
        'show' => 'backends.users.show',
        'edit' => 'backends.users.edit',
        'edit-permission' => 'backends.users.edit-permission',
        'change-password-user' => 'backends.users.change-password-user',
        'change-password' => 'backends.users.change-password',
    ];

    public function __construct(
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository,
        MessageBag $messageBag
    )
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->messageBag = $messageBag;
    }
    public function index(UserRequest $request)
    {
        $this->setTitle(trans('user.list_users'));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->userRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('user.create_user'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ]);

        $this->viewParams['listRoles'] = $this->roleRepository->all(['id', 'name']);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(UserRequest $request)
    {
        try{
            DB::transaction(function () use ($request) {
                $result = $this->userRepository->createUser($request->except('_token', 'password_confirmation', 'roles'));
                $this->userRepository->setRoles($result, $request->input('roles'));
            });
        }
        catch (\Exception $e){
            $this->messageBag->add('errors', trans('user.create_error'));
            return redirect()->route($this->routeNames['create'])->withErrors($this->messageBag)->withInput($request->input());
        }
        $this->messageBag->add('success', trans('user.create_success'));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function show($id)
    {
        $this->setTitle(trans('user.profile'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ]);
        $this->viewParams['objItem'] = $this->userRepository->find($id);
        return view('backends.users.show', $this->viewParams);
    }

    public function edit($id)
    {
        $this->setTitle(trans('user.edit_user'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ]);
        $this->viewParams['objItem'] = $this->userRepository->find($id);
        $this->viewParams['listRoles'] = $this->roleRepository->all();
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(UserRequest $request, $id)
    {
        try{
            $this->userRepository->update($id, $request->except('_token', 'roles'));
            $this->userRepository->setRoles($this->userRepository->find($id), $request->input('roles'));
        }
        catch (\Exception $e){
            $this->messageBag->add('errors', trans('user.update_error'));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('user.update_success', ['name' => 'user']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
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

    public function editPermission($id)
    {
        $this->setTitle(trans('user.edit_permission'));
        $this->setBreadcrumb([
            '_action' => 'editPermission',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ]);
        $listPermissionsUser = collect();
        if(session()->has('_old_input') && !empty(session()->get('_old_input')))
        {
            $oldInput = session()->get('_old_input');
            if(array_key_exists('permissions', $oldInput) && !empty($oldInput['permissions']))
            {
                $listPermissionsUser = $this->permissionRepository->getInArray($oldInput['permissions']);
            }
        }
        else
        {
            $listPermissionsUser = $this->userRepository->find($id)->permissions;
        }
        $listPermissions = $this->permissionRepository->all();

        $tree = [];
        $this->createTree($listPermissions, $listPermissionsUser, $tree);
        $this->viewParams['tree'] = implode('', $tree);


        return view($this->viewPaths['edit-permission'], $this->viewParams);
    }

    public function updatePermission($id, UserRequest $request)
    {
        $permissions = [];
        if($request->has('permissions'))
            $permissions = $request->input('permissions');
        try{
            $this->userRepository->setPermissions(
                $this->userRepository->find($id),
                $permissions
            );
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('user.update_fail', ['name' => 'user permission']));
            return redirect()
                ->route($this->routeNames['edit-permission'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('user.update_success', ['name' => 'user permission']));
        return redirect()
            ->withMessages($this->messageBag)
            ->route($this->routeNames['index']);
    }

    public function changePasswordUser($id)
    {
        $this->viewParams['objItem'] = $this->userRepository->find($id);
        $this->setTitle(trans('user.change_password', ['name' => $this->viewParams['objItem']->name]));
        $this->setBreadcrumb([
            '_action' => 'changePasswordUser',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('user.user')
        ]);
        return view($this->viewPaths['change-password-user'], $this->viewParams);
    }
    public function saveChangePasswordUser(UserRequest $request, $id)
    {
        if(Hash::check($request->input('your_password'), auth()->user()->getAuthPassword()))
        {
            try {
                $this->userRepository->changePassword(
                    $id,
                    $request->input('password')
                );
            }
            catch (\Exception $exception){
                $this->messageBag->add('errors', trans('user.change_pass_error'));
                return redirect()
                    ->route($this->routeNames['change-password-user'], ['id' => $id])
                    ->withInput($request->input())
                    ->withErrors($this->messageBag);
            }
        }
        else
        {
            $this->messageBag->add('errors', trans('user.your_old_pass_incorrect'));
            return redirect()
                ->route($this->routeNames['change-password-user'], ['id' => $id])
                ->withInput($request->input())
                ->withErrors($this->messageBag);
        }
        $this->messageBag->add('success', trans('user.change_pass_success'));
        return redirect()
            ->withMessages($this->messageBag)
            ->route($this->routeNames['index']);
    }

    public function changePassword()
    {
        $this->setTitle(trans('user.change_your_password'));
        $this->setBreadcrumb([
            '_action' => 'changePassword',
            '_routeIndex' => $this->routeNames['admincp'],
            '_routeIndexName' => trans('all.admincp')
        ]);
        return view($this->viewPaths['change-password'], $this->viewParams);
    }
    public function saveChangePassword(UserRequest $request)
    {
        if(Hash::check($request->input('your_password'), auth()->user()->getAuthPassword()))
        {
            try {
                $this->userRepository->changePassword(
                    auth()->id(),
                    $request->input('password')
                );
            }
            catch (\Exception $exception){
                $this->messageBag->add('errors', trans('user.change_pass_error'));
                return redirect()
                    ->route($this->routeNames['change-password'])
                    ->withInput($request->input())
                    ->withErrors($this->messageBag);
            }
        }
        else
        {
            $this->messageBag->add('errors', trans('user.pass_incorrect'));
            return redirect()
                ->route($this->routeNames['change-password'])
                ->withInput($request->input())
                ->withErrors($this->messageBag);
        }
        $this->messageBag->add('success', trans('user.change_pass_success'));
        return redirect()
            ->withMessages($this->messageBag)
            ->route($this->routeNames['admincp']);
    }
}
