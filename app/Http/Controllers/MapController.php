<?php

namespace App\Http\Controllers;

use App\Map;
use App\Http\Requests\MapRequest;
use App\Repositories\MapRepository;
use Illuminate\Http\Request;


class MapController extends ResourceController
{
    public function __construct(MapRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }

    public function store(MapRequest $request)
    {
        $request->merge(['user_id'=>$request->user()->id]);
        $result = $this->repository->store($request);
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }
    public function affect(Request $request)
    {
        $map = $this->repository->find($request);
        if ($map === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);

        if($map){
            $map->layers()->syncWithoutDetaching($request->layers);
            return response()->json($this->createResponse($map), 201);
        }
    }

     public function update(MapRequest $request)
    {
        $result = $this->repository->update($request);
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201,'no results');
    }

    public function getLayers (Request $request)
    {
        $fields = $this->getFields($request);
        $request->with = 'layers';
        $result = $this->repository->find($request, $fields);
        //dd($result);

        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);

        if ($result) {
            return response()->json($this->createResponse($result), 200);
        }

    }

     public function approve(MapRequest $request)
    {
        $map = $this->repository->find($request);
        $map->approve = true;
        $result =  $map->save();
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }

     public function share(MapRequest $request)
    {
        $map = $this->repository->find($request);
        $map->share = true;
        $result =  $map->save();
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }
}
