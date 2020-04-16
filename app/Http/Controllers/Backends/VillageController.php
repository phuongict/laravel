<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\VillageRepository;
use App\Http\Requests\Backends\VillageRequest;
use Illuminate\Support\MessageBag;
class VillageController extends Controller
{
    private $villageRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.village.index'
    ];
    private $viewPaths = [
        'index' => 'backends.village.index'
    ];
    public function __construct(VillageRepository $villageRepository, MessageBag $messageBag)
    {
        $this->villageRepository = $villageRepository;
        $this->messageBag = $messageBag;
    }

    public function index(VillageRequest $request){
        $this->setTitle(trans('all.list_name', ['name' => trans('village.villages')]));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('village.villages')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->villageRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }
}
