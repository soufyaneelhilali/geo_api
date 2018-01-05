<?php

namespace App\Http\Controllers;

use App\Repositories\QuestRepository;
use Illuminate\Http\Request;

class QuestController extends ResourceController
{
    public function __construct(QuestRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }
    public function store(Request $request)
    {
        $result = $this->repository->store($request);
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }
    public function update(Request $request)
    {
        $result = $this->repository->update($request);
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($result,201);
    }
}
