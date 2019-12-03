<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 03/12/2019
 * Time: 10:14
 */
namespace App\Abstracts;

use App\Interfaces\RepositoryInterface;

abstract class Repository implements RepositoryInterface {

    protected $modelClassName;

    public function all($columns = ['*'])
    {
        return call_user_func_array("{$this->modelClassName}::all", [$columns]);
    }

    public function create(array $attributes)
    {
        return call_user_func_array("{$this->modelClassName}::create", [$attributes]);
    }

    public function update($id, array $array)
    {
        return $this->find($id, ['id'])->update($array);
    }

    public function destroy($id)
    {
        return call_user_func_array("{$this->modelClassName}::destroy", [$id]);
    }

    public function find($id, $columns = array('*'))
    {
        return call_user_func_array("{$this->modelClassName}::find", array($id, $columns));
    }
}
