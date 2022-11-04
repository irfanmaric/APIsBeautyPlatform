<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateTreatmentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'price'=>'required',
            'Duration'=>'required',
            'Description'=>'required',
            'id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'price.required' =>'This field is required for update !',
            'Duration.required' =>'This field is required for update !',
            'Description.required' =>'This field is required for update !',
        ];

    }
}
