<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\StaffRule;

class ValidateRegisterRequest extends FormRequest
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
            'phoneNumber' => 'required | regex:/^([0-9]*$)/u | min:10 | max:11 | unique:users',
            'userName' => ['required', 'min:5', new StaffRule(), 'unique:users'],
            'mail' => 'required | email | unique:users',
            'password' => 'required | max: 12 | min:4',
            'repeatPass' => 'required | max: 12 | min:4',
            'gender' => 'required',
            'firstName' => 'required | min:3',
            'lastName' => 'required | min:3',
        ];
    }
}
