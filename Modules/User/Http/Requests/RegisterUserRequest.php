<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => ':attribute khong trong',
            'email.email' => 'Truong nhap phai dinh dang mail',
            'password' => ':attribute khong trong'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
