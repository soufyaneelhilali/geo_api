<?php
/**
 * Created by PhpStorm.
 * User: next
 * Date: 6/13/17
 * Time: 12:51 AM
 */

namespace App\Http\Controllers;


use App\Http\Requests\DeviceRequest;
use App\Repositories\DeviceRepository;
use Illuminate\Http\Request;

class DeviceController extends ResourceController
{
    public function __construct(DeviceRepository $repository, Request $request)
    {

        parent::__construct($repository, $request);
    }
    public function store(DeviceRequest $request)
    {
        $result = $this->repository->store($request,true);
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);

        if ($result)
            return response()->json($this->createResponse($result), 201);


    }
}