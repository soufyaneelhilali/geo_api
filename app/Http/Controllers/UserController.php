<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;


class UserController extends ResourceController
{

    public function __construct(UserRepository $repository, Request $request)
    {
        parent::__construct($repository, $request);
    }
    public function store(UserRequest $request)
    {
        $result = $this->repository->store($request);
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);

        if ($result)
            return response()->json($this->createResponse($result), 201);


    }
}
