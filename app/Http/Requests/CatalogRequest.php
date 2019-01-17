<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogRequest extends FormRequest
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
        return [
                'name' => 'required|unique:categorys,name',
        ];

    }
    public function messages(){
        return [
            'name.required' => 'Please Enter Name Catalog',
            'name.unique' => 'This Name Catalog is Exits',

        ];
    }
}
