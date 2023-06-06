<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createBookingRequest extends FormRequest
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
            'PhoneNumber'=>'required',
            'companyID' => 'required',
            'serviceID' => 'required',
            'Email'=>'required'
        ];
    }

    public function messages()
    {
        return [

            'PhoneNumber.required' => 'Ovo polje je obavezno !',
            'companyID.required' => 'Ovo polje je obavezno !',
            'serviceID.required' => 'Ovo polje je obavezno !',
            'Email.required' =>'Ovo polje je obavezno'
        ];

    }
}
