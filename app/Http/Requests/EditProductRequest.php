<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'required',
            'catid'=>'required',
            'producer'=>'required',
            'title'=>'required',
            'contents'=>'required',
        ];

    }
    public function messages(){
        return [
            'name.required' => 'Please Enter Name product',
            'catid.required' => 'Please Option Name product',
            'producer.required' => 'Please Enter producer product',
            'title.required' => 'Please Enter Title product',
            'contents.required' => 'Please Enter Content product 1',
        ];
    }
}
