<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapRequest extends FormRequest
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
                        $rules['name'] = 'required|string|max:50'; 
                        $rules['theme_id'] = 'required|integer'; 
                        $rules['description'] = 'string|max:150'; 
                        $rules['layers'] = 'json';
                        $rules['attributs'] = 'json';
                        break;
                    case 'PUT':
                        $rules['name'] = 'required|string|max:50'; 
                        $rules['theme_id'] = 'required|integer'; 
                        $rules['description'] = 'string|max:150'; 
                        $rules['layers'] = 'json';
                        $rules['attributs'] = 'json';

                }
                return $rules;
    }
}
