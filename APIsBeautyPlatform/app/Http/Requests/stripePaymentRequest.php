<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class stripePaymentRequest extends FormRequest
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
            'number'=>'required',
            'exp_month'=>'required',
            'exp_year'=>'required',
            'cvc'=>'required',
            'amount'=>'required',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return [

            'number.required' => 'This field is required',
            'exp_month.required' => 'This field is required',
            'exp_year.required' => 'This field is required',
            'cvc.required' => 'This field is required',
            'amount.required' => 'This field is required',
            'description.required' => 'This field is required'
        ];

    }
}
