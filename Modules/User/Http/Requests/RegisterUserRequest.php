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
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed',
            'password_conf' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute bắt buộc phải là kiểu chuỗi Aa -> Zz',
            'email' => ':attribute không đúng định dạng ',
            'numeric' => ':attribute phải là  số từ 0 -> 9',
            'max' => ':attribute phải ít hơn hay bằng :max ký tự ',
            'min' => ':attribute phải nhỏ hơn hay bằng :min ký tự ',
            'confirmed' => ':attribute nhập lại không giống nhau',
            'unique' => ':attribute đã được sử dụng'

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'firstname' => 'Ho',
            'lastname' => 'Ten',
            'address' => 'Dia chi',
            'phone' => 'So dien thoai',
            'email' => 'Email',
            'password' => 'Mat khau',
            'password_conf' => 'Xac nhan mat khau'
        ];

    }
}
