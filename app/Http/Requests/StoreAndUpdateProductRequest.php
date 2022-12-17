<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateProductRequest extends FormRequest
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
        if($this->method()=='PUT'){
         
            return [
                'title' => 'sometimes|required|min:3|max:255',
                'description' => 'sometimes|required|min:5|max:255',
                'image' => 'image|mimes:jpg,jpeg,png|sometimes|required'
            ];
        }else{
           
          return [
        'title' => 'required|min:3|max:255',
        'description' => 'sometimes|required|min:5|max:255',
        'image' => 'image|mimes:jpg,jpeg,png|sometimes|required'
           ];
       }
    }
}
