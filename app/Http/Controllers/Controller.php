<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $viewParams = [
        '_title' => 'Admin Control Panel'
    ];

    protected function setTitle($title)
    {
        $this->viewParams['_title'] = $title;
    }
    protected function setBreadcrumb(array $array)
    {
        $this->viewParams['breadcrumb'] = $array;
    }
    protected function saveImageFile($file, $folder){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs($folder, $fileName, 'public');
    }
}
