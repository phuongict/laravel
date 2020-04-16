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
use App\Interfaces\SlideRepositoryInterface;
use App\Slide;
class SlideRepository extends Repository implements SlideRepositoryInterface
{
    protected $modelClassName = '\\App\\Slide';
    private $slide;

    public function __construct(Slide $slide)
    {
        $this->slide = $slide;
    }

    public function getSlide()
    {
        // TODO: Implement getProduct() method.
        return $this->slide->select(['image', 'link'])
            ->where('status', 1)
            ->orderBy('created_at', 'desc')->get();
    }
}
