<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class resetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'token'=>'required|string'
        ];
    }
    public function messages()
    {
        return [

            'email.required' => 'Ovo polje je obavezno!',
            'password.required' =>'Ovo polje je obavezno!',
            'token.required' =>'Ovo polje je obavezno!'
        ];

    }
}
