<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends ResourceRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        switch ($this->getMethod()){
            case 'POST':
                $rules['imei'] = 'required|string|max:50|unique:devices';
                $rules['name'] = 'required|string|max:50|unique:devices';
                $rules['realtimecategory_id'] = 'exists:realtime_categories,id|required';
                $rules['public'] = 'boolean';

                break;
            case 'PUT':
                $rules['imei'] = 'string|max:50|unique:devices';
                $rules['name'] = 'string|max:50|unique:devices';
                $rules['realtimecategory_id'] = 'exists:realtime_categories,id';
                $rules['public'] = 'boolean';
        }


        return $rules;
    }
}
