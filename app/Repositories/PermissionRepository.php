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
use App\Interfaces\PermissionRepositoryInterface;
use App\Permission;

class PermissionRepository extends Repository implements PermissionRepositoryInterface
{
    protected $modelClassName = '\\App\\Permission';
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getInArray(array $array){
        return $this->permission->whereIn($this->permission->getKeyName(), $array)->get();
    }
}
