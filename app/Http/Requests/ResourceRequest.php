<?php

namespace App\Http\Requests;

use App\Tools\ResponseBuilder;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
{
    use ResponseBuilder;

    public function formatErrors(Validator $validator)
    {
        return $this->createResponse(null,422,'Unprocessable Entity',parent::formatErrors($validator));
    }
}