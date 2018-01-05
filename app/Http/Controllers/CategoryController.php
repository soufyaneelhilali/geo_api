<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends ResourceController
{

    public function __construct(CategoryRepository $repository, Request $request)
    {
        // lala7dti la classe fille katsift constructor l parrent 
        parent::__construct($repository, $request);
    }

     public function store(CategoryRequest $request)
    {
        $result = $this->repository->store($request);
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }

    

}
