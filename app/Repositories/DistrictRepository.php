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
use App\Interfaces\DistrictRepositoryInterface;

class DistrictRepository extends Repository implements DistrictRepositoryInterface
{
    protected $modelClassName = '\\App\\District';
}
