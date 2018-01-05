<?php

namespace App\Http\Controllers;
use App\Upfile;
use App\Http\Requests\UpfileRequest;
use App\Repositories\UpfileRepository;
use Chumper\Zipper\Facades\Zipper;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpfileController extends ResourceController
{

    public function __construct(UpfileRepository $repository, Request $request)
    {
        // lala7dti la classe fille katsift constructor l parrent
        parent::__construct($repository, $request);
    }

     public function store(UpfileRequest $request)
    {

        $path = Storage::disk('upfiles')->put('', $request->file('file'));

        $fullpath = $storagePath  = Storage::disk('upfiles')->getDriver()->getAdapter()->getPathPrefix() . $path;
                $request->merge(['user_id'=>$request->user()->id]);

                $request->merge(['link'=>$fullpath]);

                $result = $this->repository->store($request);
                if ($result === false)
                    return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
                if ($result)
                    return response()->json($this->createResponse($result), 201);
            }


         public function approve(UpfileRequest $request)
    {
        $upfile = $this->repository->find($request);
        $upfile->approve = true;
        $result =  $upfile->save();
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }

     public function share(UpfileRequest $request)
    {
        $upfile = $this->repository->find($request);
        $upfile->share = true;
        $result =  $upfile->save();
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }

}
