<?php
/**
 * Created by PhpStorm.
 * User: phamphuong
 * Author: Phạm Văn Phương
 * Date: 10/12/2019
 * Time: 16:45
 */

namespace App\Interfaces;

interface SlideRepositoryInterface extends RepositoryInterface
{
    public function getSlide();
}
