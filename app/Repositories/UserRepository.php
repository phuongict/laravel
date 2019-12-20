<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 03/12/2019
 * Time: 10:17
 */

namespace App\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use App\Interfaces\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    protected $modelClassName = '\\App\\User';

    public function createUser(array $array = [])
    {
        return call_user_func_array("{$this->modelClassName}::create", array([
            'name' => $array['name'],
            'email' => $array['email'],
            'password' => Hash::make($array['password'])
        ]));
    }

    public function setRoles(User $user, array $roles = []): void
    {
        $user->roles()->sync($roles);
    }

    public function setPermissions(User $user, array $permissions = []): void
    {
        $user->permissions()->sync($permissions);
    }

    public function changePassword($user_id, $newPassword)
    {
        $user = $this->find($user_id);
        $user->fill([
            'password' => Hash::make($newPassword)
        ]);
        return $user->save();
    }
}
