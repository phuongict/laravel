<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 10/12/2019
 * Time: 16:43
 */

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Interfaces\RoleRepositoryInterface;
use App\Role;

class RoleRepository extends Repository implements RoleRepositoryInterface
{
    protected $modelClassName = '\\App\\Role';

    public function setPermissions(Role $role, array $permissions = []) : void
    {
        $role->permissions()->sync($permissions);
    }
}
