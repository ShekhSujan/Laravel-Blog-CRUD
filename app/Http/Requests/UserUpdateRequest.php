<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'image' => 'mimes:jpeg,png,jpg,webp',
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->request->get('id'))
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->request->get('id'))
            ],
            'password' => [
                'confirmed',
                Rule::unique('users')->ignore($this->request->get('id'))
            ],
            'mobile' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name Field is required',
            'username.required' => 'User name is required',
            'email.required' => 'Email Address is required & unique',
            'mobile.required' => 'Mobile is required',
        ];
    }
}
