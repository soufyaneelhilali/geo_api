<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpfileRequest extends FormRequest
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
                $rules['name'] = 'required|string|max:50';//TODO ADD UNIQUE
                $rules['category_id'] = 'required|integer'; //TODO EXIST IN CATEOGOGRY
                $rules['type'] = 'required|string|max:100'; //TODO ADD in VECTOR/RASTER
                $rules['file'] = 'file';
                break;
            case 'PUT':
                $rules['name'] = 'required|string|max:50'; // TODO ADD UNIQUE EXPECT ID
                $rules['category_id'] = 'required|integer'; //TODO EXIST IN CATEOGOGRY
                $rules['type'] = 'required|string|max:100'; //TODO ADD IN 
        }
        return $rules;
    }


}
