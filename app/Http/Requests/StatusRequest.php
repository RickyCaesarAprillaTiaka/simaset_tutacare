<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StatusRequest extends Request
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
       switch($this->method())
       {
       case 'GET':
       case 'DELETE':
       case 'POST':
           return [
               'status' => 'required'
           ];
       case 'PUT':
           return [
               'status' => 'required'
           ];
       case 'PATCH':
       default:break;
   }
     }

     public function messages()
     {
         return [
             'status.required' => 'Status harus diisi!'
         ];
     }
}
