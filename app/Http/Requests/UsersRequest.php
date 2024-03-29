<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            //
            'user_firstname'=>'required|string',
            'user_lastname'=>'required|string',

        ];
    }
    public function messages(){
        return[
            'user_firstname.required'=>'Voornaam is required',
            'user_lastname.required'=>'Achternaam is required'
        ];

    }
}
