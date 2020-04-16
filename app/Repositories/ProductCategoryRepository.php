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
use App\Interfaces\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends Repository implements ProductCategoryRepositoryInterface
{
    protected $modelClassName = '\\App\\ProductCategory';
}
