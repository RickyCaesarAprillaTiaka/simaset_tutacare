<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CabangRequest extends Request
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
               'cabang' => 'required'
           ];
       case 'PUT':
           return [
               'cabang' => 'required'
           ];
       case 'PATCH':
       default:break;
   }
     }

     public function messages()
     {
         return [
             'cabang.required' => 'Cabang harus diisi!'
         ];
     }
}
