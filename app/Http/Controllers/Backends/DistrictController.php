<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\DistrictRepository;
use App\Http\Requests\Backends\DistrictRequest;
use Illuminate\Support\MessageBag;
class DistrictController extends Controller
{
    private $districtRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.district.index'
    ];
    private $viewPaths = [
        'index' => 'backends.district.index'
    ];
    public function __construct(DistrictRepository $districtRepository, MessageBag $messageBag)
    {
        $this->districtRepository = $districtRepository;
        $this->messageBag = $messageBag;
    }

    public function index(DistrictRequest $request){
        $this->setTitle(trans('all.list_name', ['name' => trans('district.districts')]));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('district.districts')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->districtRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }
}
