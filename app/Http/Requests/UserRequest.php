<?php

namespace App\Http\Requests;



class UserRequest extends ResourceRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];
        switch ($this->getMethod()){
            case 'POST':
                $rules['firstname'] = 'required|string|max:50';
                $rules['login'] = 'required|alpha_dash|unique:users|max:100';
                $rules['type'] = 'in:ADMIN,SUPER_ADMIN,USER';
                $rules['password'] = 'required|max:50';
                break;
            case 'PUT':
                $rules['firstname'] = 'string|max:50';
                $rules['login'] = 'alpha_dash|unique:users,login,'.$id.',id';
                $rules['type'] = 'in:ADMIN,SUPER_ADMIN,USER';
        }

        $rules['lastname'] = 'string|max:50|nullable';
        $rules['email'] = 'email|max:150|nullable';
        return $rules;
    }
}
