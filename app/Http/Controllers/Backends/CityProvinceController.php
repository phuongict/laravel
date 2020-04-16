<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CityProvinceRepository;
use App\Http\Requests\Backends\CityProvinceRequest;
use Illuminate\Support\MessageBag;
class CityProvinceController extends Controller
{
    private $cityRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.city-province.index'
    ];
    private $viewPaths = [
        'index' => 'backends.city-province.index'
    ];
    public function __construct(CityProvinceRepository $cityProvinceRepository, MessageBag $messageBag)
    {
        $this->cityRepository = $cityProvinceRepository;
        $this->messageBag = $messageBag;
    }

    public function index(CityProvinceRequest $request){
        $this->setTitle(trans('all.list_name', ['name' => 'Cities/Provinces']));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('city_province.city_province')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->cityRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }
}
