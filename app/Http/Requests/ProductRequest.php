<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'catid'=>'required',
            'maker'=>'required',
            'title'=>'required',
            'contents'=>'required',
        ];

    }
    public function messages(){
        return [
            'name.required' => 'Please Enter Name product',
            'name.unique' => 'This Name Catalog is Exits',
            'catid.required' => 'Please Option Name Category',
            'maker.required' => 'Please Enter name Maker',
            'title.required' => 'Please Enter Title product',
            'contents.required' => 'Please Enter Content product',

        ];
    }
}
