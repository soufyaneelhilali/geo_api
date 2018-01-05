<?php

namespace App\Http\Controllers;

use App\Repositories\Repository;
use App\Tools\ResponseBuilder;

use Illuminate\Http\Request;

class ResourceController extends Controller
{

    use ResponseBuilder;
    protected $repository;
    protected $request;

    public function __construct(Repository $repository, Request $request)
    {
        $this->repository = $repository;
        $this->request = $request;
    }
    public function index(){

        $result = $this->repository->index($this->request);

        if($result === false)
            return response()->json($this->createResponse(null,403,trans('myErrors.permission')),403);

        if($result)
            return response()->json($this->createResponse($result),200);

        return response()->json($this->createResponse(),404);
    }

    public function find(Request $request)
    {
        $fields = $this->getFields($request);
        $result = $this->repository->find($request, $fields);
        //dd($result);

        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);

        if ($result) {
            return response()->json($this->createResponse($result), 200);
        }


    }
    public function destroy(){
        $result = $this->repository->destroy($this->request);
        if($result === false)
            return response()->json($this->createResponse(null,403,trans('myErrors.permission')),403);
        if($result)
            return response()->json($this->createResponse(),200);
        return response()->json($this->createResponse(),404);
    }
    //PRIVATE FUNCTIONS ------------------------------------------------------------------------------------------------
    protected function getFields(){
        if($this->request->fields)
            return explode(',',$this->request->fields);
        return null;
    }
}

