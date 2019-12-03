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

class UserRepository extends AbstractRepository implements UserRepositoryInterface{
    protected $modelClassName = '\\App\\User';

    public function getByMail($email)
    {
        // TODO: Implement getByMail() method.
    }
}
