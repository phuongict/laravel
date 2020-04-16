<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Repositories\SlideRepository;
use App\Http\Requests\Backends\SlideRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class SlideController extends Controller
{

    private $slideRepository;
    private $messageBag;
    private $routeNames = [
        'index' => 'backend.slide.index',
        'create' => 'backend.slide.create',
        'store' => 'backend.slide.store',
        'show' => 'backend.slide.show',
        'edit' => 'backend.slide.edit',
    ];
    private $viewPaths = [
        'index' => 'backends.slide.index',
        'create' => 'backends.slide.create',
        'show' => 'backends.slide.show',
        'edit' => 'backends.slide.edit',
        'delete' => 'backends.slide.delete',
    ];

    public function __construct(
        SlideRepository $slideRepository,
        MessageBag $messageBag
    )
    {
        $this->slideRepository = $slideRepository;
        $this->messageBag = $messageBag;
    }

    public function index(SlideRequest $request)
    {
        $this->setTitle(trans('all.list_name', ['name' => 'slides']));
        $this->setBreadcrumb([
            '_action' => 'index',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('slide.slide')
        ]);
        session()->flashInput($request->input());
        $this->viewParams['lists'] = $this->slideRepository->paginateCustom($request->input());
        return view($this->viewPaths['index'], $this->viewParams);
    }

    public function create()
    {
        $this->setTitle(trans('slide.create_slide'));
        $this->setBreadcrumb([
            '_action' => 'create',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('slide.slide')
        ]);
        return view($this->viewPaths['create'], $this->viewParams);
    }

    public function store(SlideRequest $request)
    {
        if(!$request->hasFile('image') || !$request->file('image')->isValid()){
            $this->messageBag->add('errors', trans('slide.error_upload_file'));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $pathFile = $this->saveImageFile($request->file('image'), config('app.path_slide_image'));
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['created_by'] = $params['updated_by'] = auth()->id();
        try {
            $this->slideRepository->create($params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.create_error', ['name' => 'slide']));
            return redirect()
                ->route($this->routeNames['create'])
                ->withErrors($this->messageBag)
                ->withInput($request->input());
        }
        $this->messageBag->add('success', trans('all.create_success', ['name' => 'slide']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function edit($id)
    {
        $this->setTitle(trans('slide.edit_slide'));
        $this->setBreadcrumb([
            '_action' => 'edit',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('slide.slide')
        ]);
        $this->viewParams['objItem'] = $this->slideRepository->find($id);
        return view($this->viewPaths['edit'], $this->viewParams);
    }

    public function update(SlideRequest $request, $id)
    {
        $objCategory = $this->slideRepository->find($id);
        $pathFile = $objCategory->image;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $pathFile = $this->saveImageFile($request->file('image'), config('app.path_slide_image'));
            if(Storage::disk('public')->exists($objCategory->image))
                Storage::disk('public')->delete($objCategory->image);
        }
        $params = $request->except('_token');
        $params['image'] = $pathFile;
        $params['updated_by'] = auth()->id();
        try {
            $this->slideRepository->update($id, $params);
        } catch (\Exception $e) {
            $this->messageBag->add('errors', trans('all.update_fail', ['name' => 'slide']));
            return redirect()->route($this->routeNames['edit'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $this->messageBag->add('success', trans('all.update_success', ['name' => 'slide']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function delete($id){
        $this->setTitle(trans('slide.delete_slide'));
        $this->setBreadcrumb([
            '_action' => 'delete',
            '_routeIndex' => $this->routeNames['index'],
            '_routeIndexName' => trans('slide.slide')
        ]);
        $this->viewParams['objItem'] = $this->slideRepository->find($id);
        return view($this->viewPaths['delete'], $this->viewParams);
    }
    public function destroy(SlideRequest $request, $id)
    {
        if(!$request->filled('id'))
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'slide']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if($request->input('id') !== $id)
        {
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'slide']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        $objCategory = $this->slideRepository->find($id);
        try{
            $this->slideRepository->destroy($id);
        }
        catch (\Exception $exception){
            $this->messageBag->add('errors', trans('all.delete_fail', ['name' => 'slide']));
            return redirect()->route($this->routeNames['index'], ['id' => $id])
                ->withErrors($this->messageBag)->withInput($request->all());
        }
        if(Storage::disk('public')->exists($objCategory->image))
            Storage::disk('public')->delete($objCategory->image);
        $this->messageBag->add('success', trans('all.delete_success', ['name' => 'slide']));
        return redirect()->withMessages($this->messageBag)->route($this->routeNames['index']);
    }

    public function changeStatus(SlideRequest $request, $id)
    {
        if (!$request->filled('status'))
        {
            return response()->json([
                'errors' => array(trans('all.is_required', ['name' => 'status']))
            ], 422);
        }
        $findPost = $this->slideRepository->find($id, ['id']);
        if (empty($findPost))
        {
            return response()->json([
                'errors' => array(trans('all.not_found', ['name' => 'id', 'value' => $id]))
            ], 422);
        }
        try {
            $params = [];
            $params['status'] = !$request->input('status');
            $this->slideRepository->update($id, $params);
        }
        catch (\Exception $exception) {
            return response()->json([
                'errors' => array(trans('all.update_fail', ['name' => 'status']))
            ], 422);
        }

        return response()->json([
            'errors' => array(trans('user.update_success', ['name' => 'status']))
        ], 200);
    }
}
