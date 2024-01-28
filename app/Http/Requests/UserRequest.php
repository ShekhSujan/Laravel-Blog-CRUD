<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'mobile' => 'required',
            'password' => 'required|confirmed',
            'image' => 'mimes:jpeg,png,jpg,webp',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name Field is required',
            'email.required' => 'Email Address is required & unique',
            'mobile.required' => 'Mobile is required',
            'password.required' => 'Password is required',
        ];
    }
}

