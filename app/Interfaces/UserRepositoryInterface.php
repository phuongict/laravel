<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 03/12/2019
 * Time: 10:15
 */
namespace App\Interfaces;

interface UserRepositoryInterface extends RepositoryInterface{
    public function createUser(array $array);
}
