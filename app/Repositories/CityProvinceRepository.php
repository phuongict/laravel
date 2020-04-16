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
use App\Interfaces\CityProvinceRepositoryInterface;

class CityProvinceRepository extends Repository implements CityProvinceRepositoryInterface
{
    protected $modelClassName = '\\App\\CityProvince';
}
