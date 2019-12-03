<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 03/12/2019
 * Time: 08:56
 */
namespace App\Interfaces;

interface RepositoryInterface {
    public function all($columns = array('*'));
    public function create(array $attributes);
    public function update($id, array $array);
    public function destroy($id);
    public function find($id, $columns = array('*'));
}
